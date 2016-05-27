<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role_id == 4;
    }

    public function isEditor()
    {
        return $this->role_id == 3;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function changeRole($roleId)
    {
        return $this->update(['role_id' => $roleId]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
