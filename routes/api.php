<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//  文章列表
Route::get('/posts', function (Request $request) {
    $data = \App\Post::all();
    return response()->json($data);
});

//  文章详情
Route::get('/postDetail/{id}', function (Request $request, $id) {
    $data = \App\Post::find($id);
    return response()->json($data);
});

