<x-layouts.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl shadow-lg object-cover w-full h-[400px]">
                @else
                    <div class="w-full h-[400px] bg-gray-300 rounded-xl flex items-center justify-center text-gray-600">
                        No Image Available
                    </div>
                @endif
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                @if ($product->price)
                    <p class="text-2xl font-extrabold mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                @else
                    <p class="text-lg font-semibold mb-4">Hubungi Penjual untuk Harga</p>
                @endif
                <p class="mb-2"><strong>Kategori:</strong> {{ $product->category->name }}</p>
                <p class="mb-2"><strong>Lokasi:</strong> {{ $product->location ?? 'Tidak tersedia' }}</p>
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-2">Kontak Penjual</h2>
                    <div class="space-y-2">
                        @if ($product->whatsapp)
                            <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" class="inline-flex items-center space-x-2 text-green-600 hover:underline">
                                <i class="fab fa-whatsapp fa-lg"></i>
                                <span>WhatsApp</span>
                            </a>
                        @endif
                        @if ($product->phone)
                            <a href="tel:{{ $product->phone }}" class="inline-flex items-center space-x-2 text-blue-600 hover:underline">
                                <i class="fas fa-phone fa-lg"></i>
                                <span>Telepon</span>
                            </a>
                        @endif
                        @if ($product->instagram)
                            <a href="https://instagram.com/{{ $product->instagram }}" target="_blank" class="inline-flex items-center space-x-2 text-pink-600 hover:underline">
                                <i class="fab fa-instagram fa-lg"></i>
                                <span>Instagram</span>
                            </a>
                        @endif
                        @if ($product->tiktok)
                            <a href="https://tiktok.com/@{{ $product->tiktok }}" target="_blank" class="inline-flex items-center space-x-2 text-black hover:underline">
                                <i class="fab fa-tiktok fa-lg"></i>
                                <span>TikTok</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
