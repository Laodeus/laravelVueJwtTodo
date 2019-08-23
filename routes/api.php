<?php
// api.php
use Illuminate\Http\Request;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
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