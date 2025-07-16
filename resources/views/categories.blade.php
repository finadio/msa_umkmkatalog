<x-layouts.layout>
    <x-slot:title>Kategori Produk UMKM</x-slot:title>

    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h1 class="text-3xl font-bold mb-6">Kategori Produk UMKM</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <div class="relative rounded-xl overflow-hidden shadow-lg cursor-pointer hover:shadow-2xl transition">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover rounded-xl">
                    <div class="absolute bottom-4 left-4 text-white font-semibold text-lg drop-shadow-lg">
                        {{ $category->name }}
                        <p class="text-sm font-normal">{{ $category->products_count }} Produk</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.layout>
