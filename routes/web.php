<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', 'AdminUsersController@index')->name('admin.users.index');
Route::post('/admin/users', 'AdminUsersController@store')->name('admin.users.store');
Route::get('/admin/users/create', 'AdminUsersController@create')->name('admin.users.create');
Route::put('/admin/users/{user}', 'AdminUsersController@update')->name('admin.users.update');
Route::get('/admin/users/{user}/edit', 'AdminUsersController@edit')->name('admin.users.edit');
Route::get('/admin/users/{user}/delete', 'AdminUsersController@destroy')->name('admin.users.destroy');

Route::get('/admin/posts', 'AdminPostsController@index')->name('admin.posts.index');
Route::post('/admin/posts', 'AdminPostsController@store')->name('admin.posts.store');
Route::get('/admin/posts/create', 'AdminPostsController@create')->name('admin.posts.create');
Route::put('/admin/posts/{post}', 'AdminPostsController@update')->name('admin.posts.update');
Route::get('/admin/posts/{post}/edit', 'AdminPostsController@edit')->name('admin.posts.edit');
Route::get('/admin/posts/{post}/delete', 'AdminPostsController@destroy')->name('admin.posts.destroy');

Route::get('/admin/comments', 'AdminCommentsController@index')->name('admin.comments.index');
Route::post('/admin/comments', 'AdminCommentsController@store')->name('admin.comments.store');
Route::get('/admin/comments/create', 'AdminCommentsController@create')->name('admin.comments.create');
Route::put('/admin/comments/{comment}', 'AdminCommentsController@update')->name('admin.comments.update');
Route::get('/admin/comments/{comment}/edit', 'AdminCommentsController@edit')->name('admin.comments.edit');
Route::get('/admin/comments/{comment}/delete', 'AdminCommentsController@destroy')->name('admin.comments.destroy');

Route::get('/admin/categories', 'AdminCategoriesController@index')->name('admin.categories.index');
Route::post('/admin/categories', 'AdminCategoriesController@store')->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit', 'AdminCategoriesController@edit')->name('admin.categories.edit');
Route::put('/admin/categories/{category}', 'AdminCategoriesController@update')->name('admin.categories.update');
Route::get('/admin/categories/{category}/delete', 'AdminCategoriesController@destroy')->name('admin.categories.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
