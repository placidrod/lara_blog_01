<?php

Route::get('test', function() {
  
});

Route::singularResourceParameters();

Route::get('/', function () {
  $published_posts = App\Post::published();
  return view('welcome', ['posts'=>$published_posts]);
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('posts', 'PostController');