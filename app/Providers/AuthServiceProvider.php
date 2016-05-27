<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });        

        $gate->define('manage-users', function ($user)
        {
            return $user->isAdmin();
        });

        $gate->define('author-post', function ($user)
        {
            return $user->role_id !== 1;
        });

        $gate->define('update-post', function ($user, $post)
        {
            return $user->id === $post->user_id || $user->isEditor();
        });

        $gate->define('delete-post', function ($user)
        {
            return $user->isAdmin() || $user->isEditor();
        });
    }
}
