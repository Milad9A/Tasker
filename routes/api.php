<?php

use Illuminate\Http\Request;

Route::get('posts', 'PostsController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
