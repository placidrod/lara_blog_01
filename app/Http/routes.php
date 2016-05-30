<?php

Route::get('test', function() {
  
});

Route::singularResourceParameters();

Route::get('project-details', function() {
  return view('pages.project-details');
});

Route::get('/', function () {
  $published_posts = App\Post::published();
  return view('welcome', ['posts'=>$published_posts]);
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::get('unpublished-posts', ['as' => 'posts.unpublished-posts', function ()
{
  $unpublished_posts = App\Post::unpublished();
  return view('posts.unpublished-posts', ['posts'=>$unpublished_posts]);
}]);

Route::resource('posts', 'PostController');