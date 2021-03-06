<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // mutator for hashing password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // one user can have many posts

    public function post()
    {
       return $this->hasMany(Post::class);
    }

    // adding permissions to user
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
    // adding roles to user
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // checking for assigned roles
    public function userHasRole($role_name)
    {
        foreach($this->roles as $role){
            if($role_name == $role->name)
            return true;
        }
        session()->flash('message', 'No permissions to view this page');
        return false;
    }

    // fix for display images allow to use http(s) and local images
    public function getPhotoAttribute($value)
     {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
        }
}
