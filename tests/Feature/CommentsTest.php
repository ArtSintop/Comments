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
        @test
    **/
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
        @test
    **/
    public function can_create_child_comments()
    {
    	$controller = new CommentsController;

    	$controller->store(new Request([
    		'name' => 'child',
    		'comment' => 'comment',
    		'level' => '2'
    	]));

        $this->assertDatabaseHas('comments', 
        	[
        		'name' => 'child',
        		'comment' => 'comment',
        		'level' => 2
        	]
        );
    }
}
