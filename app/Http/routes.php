<?php

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function () {
    
    Route::resource('/posts', '\Picturesque\Http\Controllers\PostsController');

    Route::resource('/categories', '\Picturesque\Http\Controllers\CategoriesController');

    Route::resource('/photos', '\Picturesque\Http\Controllers\PhotosController');

    Route::resource('/users', '\Picturesque\Http\Controllers\UsersController');
    
});