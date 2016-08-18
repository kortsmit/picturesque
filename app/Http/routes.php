<?php

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function () {
    
    Route::resource('/posts', '\Picturesque\Http\Controllers\PostsController');
    Route::get(
        '/posts/slug/{slug}',
        array(
            'as'   => 'post.show.slug',
            'uses' => '\Picturesque\Http\Controllers\PostsController@showBySlug'
        )
    );

    Route::resource('/categories', '\Picturesque\Http\Controllers\CategoriesController');

    Route::resource('/photos', '\Picturesque\Http\Controllers\PhotosController');

    Route::resource('/users', '\Picturesque\Http\Controllers\UsersController');
    
});