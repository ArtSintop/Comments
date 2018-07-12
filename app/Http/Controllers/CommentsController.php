<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Verifier\LevelVerifier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;

class CommentsController extends Controller
{
    use RefreshDatabase;

	public function show()
	{
		return Comment::all();
	}

    public function index()
    {
        //Hard code max level, but can change to have custom inputs later
        $maxLevel = 4;

        //Order comments by date
    	$comments = Comment::orderBy('created_at')->get();
        $comments = $comments->groupBy('parentId');

    	return view('comments', ['comments' => $comments, 'maxLevel' => $maxLevel]);
    }

    public function store(Request $request)
    {
        $maxLevel = 4;

    	//if level exists increase it by one otherwise it is a new comment
    	$level = isset($request->level) ? $request->level + 1 : 1;

        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        // dd($request->all());

        if(LevelVerifier::verifyLevelLimit($maxLevel, $level)){
        	Comment::create([
        		'name' => $request->name,
        		'comment' =>  $request->comment,
        		'parentId' => $request->parentId,
        		'level' => $level
        	]);

        	return back();            
        } else {
            throw new \Exception('Maximum Level reached');
        }

    }
}
