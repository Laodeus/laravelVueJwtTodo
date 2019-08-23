<?php
// api.php
use Illuminate\Http\Request;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/todo/store', 'ToDoController@store');
Route::get('/todo/edit/{id}', 'ToDoController@edit');
Route::post('/todo/update/{id}', 'ToDoController@update');
Route::delete('/todo/delete/{id}', 'ToDoController@delete');
Route::get('/todos/{idUsername}', 'ToDoController@index');

Route::get('/tasks/{idTodo}', 'TaskController@index');
Route::post('/task/update/{id}', 'TaskController@update');
Route::delete('/task/delete/{id}', 'TaskController@delete');

Route::post('/task/store', 'TaskController@store');