<?php


Route::get('/', 'ImageController@show');
Route::get('comments/create', 'ImageController@create');
Route::post('images/store', 'ImageController@store');
Route::post('images/update', 'ImageController@update');
Route::get('images/edit/{id}', 'ImageController@edit');
Route::get('images/destroy/{id}', 'ImageController@destroy');

Route::get('comments/show/{id}', 'CommentController@show');
Route::get('comments/create/{id}', 'CommentController@create');
Route::post('comments/store', 'CommentController@store');
Route::post('comments/update', 'CommentController@update');
Route::get('comments/edit/{id}', 'CommentController@edit');
Route::get('comments/destroy/{id}', 'CommentController@destroy');





