<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class UmkmController extends Controller
{
    // Menampilkan semua kategori beserta produk-produknya
    public function index()
    {
        $categories = Category::with('products')->get();

        return view('umkm.index', [
            'title' => 'Daftar UMKM',
            'categories' => $categories,
        ]);
    }

    // Menampilkan produk berdasarkan slug kategori
    public function kategori($kategori)
    {
        $category = Category::where('slug', $kategori)->firstOrFail();
        $products = $category->products;

        return view('umkm.kategori', [
            'title' => "Kategori: $category->name",
            'category' => $category,
            'products' => $products,
        ]);
    }
}
