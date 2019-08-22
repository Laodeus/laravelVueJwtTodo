<?php
// api.php
use Illuminate\Http\Request;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/todo/store', 'ToDoController@store');
Route::get('/todo/edit/{id}', 'ToDoController@edit');
Route::post('/todo/update/{id}', 'ToDoController@update');
Route::delete('/post/delete/{id}', 'PostController@delete');
Route::get('/todos/{idUsername}', 'ToDoController@index');