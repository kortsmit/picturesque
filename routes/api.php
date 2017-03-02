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

Route::group(['middleware' => ['api']], function () {

    Route::get(
        '/posts/all',
        array(
            'as'   => 'post.show.all',
            'uses' => '\Picturesque\Http\Controllers\PostsController@all'
        )
    );
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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
