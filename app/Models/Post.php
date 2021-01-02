<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // one post can have one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* // image path accessor
    public function getPostImageAttributes($value)
    {
        return asset($value);
    } */

    // fix for display images allow to use http(s) and local images
    public function getPostImageAttribute($value)
     {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
        }
}
