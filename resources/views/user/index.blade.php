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
                    position: 'mid'
                });
            });
        </script>
    @endif

    <div class="bg-white rounded-b-3xl shadow-md mb-6">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <span class="font-bold text-2xl tracking-wide">BPR MSA</span>
            </div>
            <!-- Menu -->
            <nav class="hidden md:flex space-x-8 text-base font-medium">
                <a href="#" class="hover:text-blue-600 transition">Home</a>
                <a href="#" class="hover:text-blue-600 transition">Shop</a>
                <a href="#" class="hover:text-blue-600 transition">Product</a>
                <a href="#" class="hover:text-blue-600 transition">Blog</a>
                <a href="#" class="hover:text-blue-600 transition">Featured</a>
            </nav>
            <!-- Icons -->
            <div class="flex items-center space-x-4">
                <button class="hover:text-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </button>
                <button class="hover:text-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75a.75.75 0 01-.75.75h-13.5a.75.75 0 01-.75-.75v-.75z" />
                    </svg>
                </button>
                <button class="hover:text-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0A48.108 48.108 0 0112 6.75c2.786 0 5.527.235 8.144.687l.383-1.437a1.125 1.125 0 011.087-.835H21.75M6.75 6.75v12a2.25 2.25 0 002.25 2.25h6a2.25 2.25 0 002.25-2.25v-12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- HERO / BANNER -->
    <div class="relative w-full mx-auto overflow-hidden rounded-3xl mb-8 h-[420px] flex items-center justify-center" style="background: url('{{ count($banners) > 0 ? asset('storage/' . $banners[0]->image) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80' }}') center/cover no-repeat;">
        <div class="absolute inset-0 bg-black/20 rounded-3xl"></div>
        <div class="relative z-10 text-center text-white flex flex-col items-center justify-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">The Art of Modern<br>Interior Living</h1>
            <p class="text-lg md:text-xl mb-8 drop-shadow">Discover the best furniture for your home</p>
            <a href="/user/products" class="bg-white text-gray-900 font-semibold px-8 py-3 rounded-full shadow hover:bg-gray-100 transition">Shop Now</a>
        </div>
    </div>

    <!-- FITUR UTAMA -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10 text-center">
        <div class="flex flex-col items-center bg-white rounded-xl py-6 shadow">
            <span class="text-2xl mb-2">🚚</span>
            <span class="font-semibold">Free Shipping Over $50</span>
        </div>
        <div class="flex flex-col items-center bg-white rounded-xl py-6 shadow">
            <span class="text-2xl mb-2">✅</span>
            <span class="font-semibold">Quality Assurance</span>
        </div>
        <div class="flex flex-col items-center bg-white rounded-xl py-6 shadow">
            <span class="text-2xl mb-2">🔄</span>
            <span class="font-semibold">Return within 14 days</span>
        </div>
        <div class="flex flex-col items-center bg-white rounded-xl py-6 shadow">
            <span class="text-2xl mb-2">💬</span>
            <span class="font-semibold">Support 24/7</span>
        </div>
    </div>

    <!-- KATEGORI -->
    <div class="mb-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="#" class="group block bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=400&q=80" class="w-full h-40 object-cover group-hover:scale-105 transition" alt="Bathroom">
                <div class="p-4 text-center">
                    <div class="font-semibold">Bathroom</div>
                    <div class="text-xs text-gray-500">6 ITEMS</div>
                </div>
            </a>
            <a href="#" class="group block bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format&fit=crop&w=400&q=80" class="w-full h-40 object-cover group-hover:scale-105 transition" alt="Chair">
                <div class="p-4 text-center">
                    <div class="font-semibold">Chair</div>
                    <div class="text-xs text-gray-500">7 ITEMS</div>
                </div>
            </a>
            <a href="#" class="group block bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" class="w-full h-40 object-cover group-hover:scale-105 transition" alt="Decor">
                <div class="p-4 text-center">
                    <div class="font-semibold">Decor</div>
                    <div class="text-xs text-gray-500">17 ITEMS</div>
                </div>
            </a>
            <a href="#" class="group block bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=400&q=80" class="w-full h-40 object-cover group-hover:scale-105 transition" alt="Lamp">
                <div class="p-4 text-center">
                    <div class="font-semibold">Lamp</div>
                    <div class="text-xs text-gray-500">3 ITEMS</div>
                </div>
            </a>
        </div>
    </div>

    <!-- PROMO / EDUKASI SECTION -->
    <div class="grid md:grid-cols-2 gap-8 mb-12 items-center">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold mb-3">Luminous Living: Innovative Lighting Designs</h2>
            <p class="text-gray-600 mb-6">Most of the style's furniture have a touch of modern European furniture with a simple design to create harmony with the dark interior design.</p>
            <a href="#" class="inline-block bg-gray-900 text-white px-6 py-2 rounded-full font-semibold hover:bg-gray-700 transition">Shop Now</a>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80" class="rounded-2xl w-full object-cover h-60 md:h-72 shadow" alt="Living Room">
        </div>
    </div>

    <!-- BESTSELLER SECTION -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Bestseller</h2>
            <a href="/user/products" class="text-sm text-blue-600 hover:underline">View All</a>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($trendingProducts as $product)
                <div class="relative flex flex-col rounded-2xl border border-gray-200 bg-white p-6 shadow hover:shadow-lg transition h-full">
                    @if ($loop->first)
                        <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-11%</span>
                    @elseif ($product->stock < 1)
                        <span class="absolute top-4 left-4 bg-gray-700 text-white text-xs font-bold px-2 py-1 rounded">Out of stock</span>
                    @endif
                    <div class="h-40 w-full flex items-center justify-center mb-4">
                        <a href="{{ route('user.products.detail', $product->slug) }}">
                            @if ($product->image)
                                <img class="mx-auto h-full object-cover rounded-xl" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <div class="h-40 w-full flex items-center justify-center bg-gray-100 text-gray-500 rounded-xl">
                                    <p>No image</p>
                                </div>
                            @endif
                        </a>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <a href="{{ route('user.products.detail', $product->slug) }}" class="block text-lg font-semibold leading-tight text-gray-900 hover:underline truncate mb-1" title="{{ $product->name }}">
                            {{ Str::limit($product->name, 30, '...') }}
                        </a>
                        <div class="text-sm text-gray-500 mb-2">
                            <span>⭐ {{ number_format($product->average_rating, 1) }} ({{ $product->total_ratings }} reviews)</span>
                        </div>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <a href="/user/products"
            class="rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 
        hover:bg-gray-100 hover:text-blue-700 hover:border-blue-700 focus:outline-none focus:ring-4 focus:ring-gray-200">
            Show more
        </a>
    </div>
</x-layouts.layout>
