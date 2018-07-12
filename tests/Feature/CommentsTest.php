<?php

namespace Tests;

use Tests\TestCase;
use App\Comment;
use App\Http\Controllers\CommentsController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class CommentsTest extends TestCase
{
	use RefreshDatabase;

    /**
     * @test
     */
    public function can_create_intial_comment()
    {
    	$controller = new CommentsController;

    	$controller->store(new Request([
    		'name' => 'first',
    		'comment' => 'comment'
    	]));

        $this->assertDatabaseHas('comments', 
        	[
        		'name' => 'first',
        		'comment' => 'comment',
        		'level' => 1
        	]
        );
    }

    /**
     * @test
     */
    public function can_create_child_comments()
    {
    	$controller = new CommentsController;

        $comment = Comment::create([
            'name' => 'abc',
            'comment' => 'def',
            'level' => 1
        ]);

    	$controller->store(new Request([
    		'name' => 'child',
    		'comment' => 'comment',
    		'level' => '1',
            'parentId' => $comment->id
    	]));

        $this->assertDatabaseHas('comments', 
        	[
        		'name' => 'child',
        		'comment' => 'comment',
        		'level' => 2,
                'parentId' => $comment->id
        	]
        );
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function throws_exception_if_level_is_too_high()
    {
        $controller = new CommentsController;

        $controller->store(new Request([
            'name' => 'child',
            'comment' => 'comment',
            'level' => '5'
        ]));
    }
}
