<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori',      // kolom string (opsional, untuk backward compatibility)
        'category_id',   // foreign key ke tabel categories (untuk relasi)
        'status',
        'views',
    ];

    /**
     * Relasi ke model Category (many-to-one).
     * Setiap artikel dimiliki oleh satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Accessor untuk mendapatkan URL gambar.
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return 'https://via.placeholder.com/600x400';
    }

    /**
     * Scope untuk filter berdasarkan kategori (menggunakan category_id).
     * Contoh penggunaan: Artikel::filterKategori($id)->get();
     */
    public function scopeFilterKategori($query, $categoryId)
    {
        if (!empty($categoryId)) {
            return $query->where('category_id', $categoryId);
        }
        return $query;
    }

    /**
     * Scope untuk filter berdasarkan status (publish/draft).
     */
    public function scopePublish($query)
    {
        return $query->where('status', 'publish');
    }
}