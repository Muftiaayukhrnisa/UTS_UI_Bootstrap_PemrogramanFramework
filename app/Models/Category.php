<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all posts for the category.
     * Relasi one-to-many: satu kategori memiliki banyak post.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}