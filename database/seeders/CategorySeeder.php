<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Kategori utama
    $fashion = Category::create(['name' => 'Fashion & Aksesoris']);
    $kerajinan = Category::create(['name' => 'Kerajinan Tangan']);

    // Subkategori dari Fashion
    Category::create(['name' => 'Sajadah', 'parent_id' => $fashion->id]);
    Category::create(['name' => 'Gamis', 'parent_id' => $fashion->id]);
    Category::create(['name' => 'Celana', 'parent_id' => $fashion->id]);

    // Subkategori dari Kerajinan (contoh saja)
    Category::create(['name' => 'Anyaman', 'parent_id' => $kerajinan->id]);
    Category::create(['name' => 'Souvenir', 'parent_id' => $kerajinan->id]);
    }
}
