<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Post & Category Relationship
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }


    /**
     * Post & Category Relationship
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    /**
     * Post user 
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
