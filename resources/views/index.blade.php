<x-layouts.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                    position: 'mid'
                });
            });
        </script>
    @endif

    <!-- Hero Banner -->
    <div class="relative w-full overflow-hidden rounded-3xl mb-8 shadow-lg">
        <div class="relative">
            @if(count($banners) > 0 && $banners[0]->image)
                <img src="{{ asset('storage/' . $banners[0]->image) }}" alt="Hero Banner" class="w-full h-[400px] object-cover rounded-3xl">
            @else
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" alt="Hero Banner" class="w-full h-[400px] object-cover rounded-3xl">
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-40 rounded-3xl flex items-center justify-center">
                <h1 class="text-white text-4xl md:text-5xl font-bold text-center leading-tight px-4 drop-shadow-lg">
                    Temukan Produk UMKM Terbaik di Kota Anda
                </h1>
            </div>
        </div>
    </div>

    <!-- Info Bar -->
    <div class="bg-white rounded-xl py-4 px-6 flex flex-col md:flex-row justify-around items-center gap-4 mb-10 shadow">
        <div class="flex items-center space-x-2 text-gray-700">
            <i class="fa fa-truck text-blue-600"></i>
            <span>Gratis Ongkir di atas Rp100.000</span>
        </div>
        <div class="flex items-center space-x-2 text-gray-700">
            <i class="fa fa-shield-halved text-green-600"></i>
            <span>Jaminan Kualitas</span>
        </div>
        <div class="flex items-center space-x-2 text-gray-700">
            <i class="fa fa-rotate-left text-yellow-600"></i>
            <span>Retur 14 Hari</span>
        </div>
        <div class="flex items-center space-x-2 text-gray-700">
            <i class="fa fa-headset text-purple-600"></i>
            <span>Support 24/7</span>
        </div>
    </div>

    <!-- Categories -->
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Kategori Populer</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 mb-10">
        @foreach ($categories as $category)
            <div class="relative rounded-xl overflow-hidden shadow-md bg-white hover:shadow-xl transition group cursor-pointer">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-40 object-cover group-hover:scale-105 transition rounded-t-xl">
                @else
                    <img src="https://source.unsplash.com/400x300/?{{ urlencode($category->name) }}" alt="{{ $category->name }}" class="w-full h-40 object-cover group-hover:scale-105 transition rounded-t-xl">
                @endif
                <div class="p-4">
                    <div class="font-bold text-lg text-gray-800 group-hover:text-blue-600">{{ $category->name }}</div>
                    <p class="text-sm text-gray-500">{{ $category->products_count }} produk</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Featured Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10 items-center">
        <div>
            <h3 class="uppercase text-sm font-semibold text-blue-500 mb-2">Pilihan Unggulan</h3>
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Produk Terbaik UMKM Lokal</h2>
            <p class="text-gray-600 mb-6">Dukung produk lokal dengan membeli produk-produk terbaik dari UMKM di sekitar Anda. Kualitas terjamin, harga bersaing, dan desain kekinian.</p>
            <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition font-semibold shadow">Belanja Sekarang</a>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Featured" class="rounded-xl shadow-lg object-cover w-full h-64">
        </div>
    </div>

    <!-- Bestseller Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Produk Terlaris</h2>
                <p class="text-gray-500">Produk paling diminati pembeli!</p>
            </div>
            <a href="/products" class="text-sm font-semibold text-blue-600 hover:underline">Lihat Semua</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($bestsellers as $product)
                <div class="relative flex flex-col rounded-xl border border-gray-200 bg-white p-4 shadow-sm h-full hover:shadow-md transition group">
                    @if($product->discount)
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">-{{ $product->discount }}%</span>
                    @endif
                    @if($product->stock == 0)
                        <span class="absolute top-2 right-2 bg-gray-500 text-white text-xs font-bold px-2 py-1 rounded-full">Stok Habis</span>
                    @endif
                    <div class="h-40 w-full mb-4 flex items-center justify-center">
                        <a href="{{ route('user.products.detail', $product->slug) }}">
                            @if ($product->image)
                                <img class="mx-auto h-full object-cover rounded-lg group-hover:scale-105 transition" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img class="mx-auto h-full object-cover rounded-lg group-hover:scale-105 transition" src="https://source.unsplash.com/400x300/?product,{{ urlencode($product->name) }}" alt="{{ $product->name }}">
                            @endif
                        </a>
                    </div>
                    <div class="flex-grow">
                        <a href="{{ route('user.products.detail', $product->slug) }}" class="block text-lg font-semibold leading-tight text-gray-900 hover:text-blue-600 truncate" title="{{ $product->name }}">
                            {{ Str::limit($product->name, 30, '...') }}
                        </a>
                        <div class="mt-2 text-sm text-gray-500">
                            <p>⭐ {{ number_format($product->average_rating, 1) }} ({{ $product->total_ratings }} ulasan)</p>
                            <p>🛒 Stok: {{ $product->stock > 0 ? $product->stock : 'Habis' }}</p>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-2xl font-extrabold text-blue-700">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <a href="{{ route('products.detail', $product->slug) }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 w-full font-semibold shadow">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.layout>
