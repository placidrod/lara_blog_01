<?php

Route::singularResourceParameters();

Route::auth();

Route::get('project-details', function() {
  return view('pages.project-details');
});

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::get('/', 'PostController@index');

Route::get('admin-index', ['as' => 'posts.admin-index', 'uses' => 'PostController@adminIndex']);

Route::get('unpublished-posts', ['as' => 'posts.unpublished-posts', 'uses' => 'PostController@unpublishedPosts']);

Route::resource('posts', 'PostController');

// Route::post('categories', 'PostCategoryController@store');

Route::resource('categories', 'PostCategoryController');