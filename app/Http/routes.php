<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('abc', function () {
    return "abc please";
});

Route::get('list',['uses' => 'MemberController@getList']);
Route::post('add',['uses' => 'MemberController@getAdd']);
Route::get('edit/{id}',['uses' => 'MemberController@getEdit']);
Route::post('edit/{id}',['uses' => 'MemberController@postEdit']);
Route::get('delete/{id}',['uses' => 'MemberController@getDelete']);