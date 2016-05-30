<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::saving(function ($post)
        {
            $title = $post->title;
            $proposed_slug = strtolower(str_replace(' ', '-', $title));
            $existing_slug = Post::where([ ['slug', $proposed_slug], ['id', '<>', $post->id] ])->first();

            if(! $existing_slug) {
                $post->slug = $proposed_slug;
            } else {
                $number_added_to_slug = 0;

                do {
                    $number_added_to_slug += 1;
                    $numbered_proposed_slug = $proposed_slug . '-' . $number_added_to_slug;
                    // $existing_slug = Post::where('slug', $numbered_proposed_slug)->where('id', '<>', $post->id)->first();
                    $existing_slug = Post::where([ ['slug', $numbered_proposed_slug], ['id', '<>', $post->id] ])->first();
                } while($existing_slug);

                $post->slug = $numbered_proposed_slug;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
