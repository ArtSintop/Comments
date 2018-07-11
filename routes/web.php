<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'CommentsController@index');
route::get('/show', 'CommentsController@show');
Route::post('/comments/post', 'CommentsController@store');
Route::post('/comments/{id}/post', 'CommentsController@storeNested');

// Route::get('/', function () {
//     return view('comments');
// });

Route::get('/test', function(){
	return 'hi';
});
