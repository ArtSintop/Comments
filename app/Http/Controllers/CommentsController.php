<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentsController extends Controller
{
    public function index()
    {
    	return Comments::all();
    }

    public function store(Request $request)
    {
    	Comments::create([
    		'name' => $request->name,
    		'comment' =>  $request->comment
    	]);

    	return back();
    }
}
