<?php

namespace App\Providers;

use App\Post;
use App\Category;
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
            $post->slug = $this->generateSlug($post);
        });

        Category::saving(function ($category)
        {
            $category->slug = $this->generateSlug($category);
        });
    }

    private function generateSlug($model)
    {
        $title = $model->title;
        $proposed_slug = strtolower(str_replace(' ', '-', $title));
        $existing_slug = $model->where([ ['slug', $proposed_slug], ['id', '<>', $model->id] ])->first();

        if(! $existing_slug) {
            return $proposed_slug;
        } else {
            $number_added_to_slug = 0;

            do {
                $number_added_to_slug += 1;
                $numbered_proposed_slug = $proposed_slug . '-' . $number_added_to_slug;
                $existing_slug = $model->where([ ['slug', $numbered_proposed_slug], ['id', '<>', $model->id] ])->first();
            } while($existing_slug);

            return $numbered_proposed_slug;
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
