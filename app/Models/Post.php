<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'category_id',
    ];

    /**
     * Get the category that owns the post.
     * Relasi many-to-one: setiap post milik satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}