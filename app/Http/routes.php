<?php

Route::get('test', function() {

  $value = 'First Post dfdf';

  $proposed_slug = strtolower(str_replace(' ', '-', $value));
  // return $proposed_slug;
  $existing_slug = App\Post::where('slug', $proposed_slug)->first();
  // return gettype($existing_slug);

  if(! $existing_slug) {
    return "slug does not exist";
  }
  return "slug exists";
  
  $number_added_to_slug = 0;

  do {
    $number_added_to_slug += 1;
    $numbered_proposed_slug = $proposed_slug . '-' . $number_added_to_slug;
    $existing_slug = App\Post::where('slug', $numbered_proposed_slug)->first();
  } while($existing_slug);

  return $numbered_proposed_slug;
  
});

Route::singularResourceParameters();

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('posts', 'PostController');