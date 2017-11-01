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

Route::group(['middleware' => ['cor']], function () {
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

    //todod
    Route::get('/todos', function () {
        $data = \App\Todo::all();
        return response()->json($data);
    });

    Route::get('/todos/{id}', function ($id) {
        $data = \App\Todo::find($id);
        return $data;
    });

    Route::post('/todos/create', function (Request $request) {
        $data = \App\Todo::create([
            'title' => $request['title']
        ]);
        return $data;
    });

    Route::patch('/todos/{id}/completed', function ($id) {
        $data = \App\Todo::find($id);
        $data->completed = !$data->completed;
        $data->save();

        return $data;
    });

    Route::delete('/todos/{id}/delete', function ($id) {
        $data = \App\Todo::find($id)->delete();
        return response()->json(['deleted']);
    });
});



