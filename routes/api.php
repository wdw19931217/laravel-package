<?php

use Illuminate\Http\Request;
use App\Todo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/todos', function () {
	$todos = App\Todo::all();
	return $todos;
})->middleware('api');


Route::get('/todo/{id}', function ($id) {
	$todo = App\Todo::find($id);
	return $todo;
})->middleware('api');

Route::post('/todo/create', function (Request $request) {
	$data = ['title' => $request->input('title'),'completed' => 0,'created_at' => time(),'updated_at' => time()];
	$todo = App\Todo::create($data);
	return $todo;
})->middleware('api');
