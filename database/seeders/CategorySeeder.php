<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan beberapa kategori awal
        Category::create([
            'name' => 'Teknologi',
        ]);

        Category::create([
            'name' => 'Pendidikan',
        ]);

        Category::create([
            'name' => 'Kesehatan',
        ]);

        // Alternatif: menggunakan insert() untuk banyak data sekaligus
        // Category::insert([
        //     ['name' => 'Teknologi', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Pendidikan', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Kesehatan', 'created_at' => now(), 'updated_at' => now()],
        // ]);
    }
}