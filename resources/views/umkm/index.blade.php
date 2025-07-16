@extends('layouts.app')

@section('title', 'UMKM')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar UMKM Berdasarkan Kategori</h1>

        @forelse ($categories as $category)
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-blue-700 mb-3">{{ $category->name }}</h2>

                @if ($category->products->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($category->products as $product)
                            <div class="border rounded-xl bg-white p-4 shadow hover:shadow-md transition duration-200">
                                <h3 class="font-bold text-gray-700 mb-1">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500 mb-2">{{ Str::limit($product->description, 100) }}</p>
                                <a href="/products/{{ $product->slug }}" class="text-blue-600 hover:underline text-sm">Lihat Detail</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic">Belum ada produk dalam kategori ini.</p>
                @endif
            </div>
        @empty
            <p class="text-gray-600">Belum ada kategori UMKM tersedia.</p>
        @endforelse
    </div>
@endsection
