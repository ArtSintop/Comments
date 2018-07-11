<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Verifier\LevelVerifier;

class CommentsController extends Controller
{

	public function show()
	{
		return Comment::all();
	}

    public function index()
    {
        $maxLevel = 4;

    	$comments = Comment::all()->groupBy('parentId');

    	return view('comments', ['comments' => $comments, 'maxLevel' => $maxLevel]);
    }

    public function store(Request $request)
    {
    	//if level exists increase it by one otherwise it is a new comment
    	$level = isset($request->level) ? $request->level + 1 : 1;

    	Comment::create([
    		'name' => $request->name,
    		'comment' =>  $request->comment,
    		'parentId' => $request->parentId,
    		'level' => $level
    	]);

    	return back();
    }
}
