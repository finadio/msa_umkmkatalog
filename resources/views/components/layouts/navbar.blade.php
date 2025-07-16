<nav class="bg-white shadow-md mb-6 sticky top-0 z-50 rounded-b-2xl">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-8 py-2">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img class="h-12 w-auto rounded bg-white shadow" src="/img/msa.png" alt="UMKM MSA Logo">
            <span class="font-bold text-xl md:text-2xl tracking-wide text-blue-800">UMKM MSA</span>
        </div>
        <!-- Menu -->
        <nav class="hidden md:flex space-x-10 text-base font-medium items-center">
            <a href="/" class="hover:text-blue-600 transition {{ request()->is('/') ? 'text-blue-700 font-bold' : 'text-gray-700' }}">Beranda</a>
            <a href="/umkm" class="hover:text-blue-600 transition {{ request()->is('umkm*') ? 'text-blue-700 font-bold' : 'text-gray-700' }}">UMKM</a>
            <a href="/products" class="hover:text-blue-600 transition {{ request()->is('products*') ? 'text-blue-700 font-bold' : 'text-gray-700' }}">Produk</a>
        </nav>
        <!-- Icons -->
        <div class="flex items-center space-x-6">
            <button class="hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>
            @auth
            <a href="{{ route('user.cart') }}" class="relative hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                @php
                    $maincart = \App\Models\Cart::where('user_id', Auth::user()->id)
                        ->where('status', 'pending')
                        ->first();
                    $cartcount = $maincart
                        ? \App\Models\Cart_Item::where('cart_id', $maincart->id)->count()
                        : 0;
                @endphp
                @if ($cartcount > 0)
                    <span class="absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                        {{ $cartcount }}
                    </span>
                @endif
            </a>
            @endauth
            @guest
            <a href="/login" class="hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0V5.25m0 0A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0h-9m9 0v10.5A2.25 2.25 0 0115.75 21h-7.5A2.25 2.25 0 016 19.5V9m9 0H6" />
                </svg>
            </a>
            @endguest
        </div>
    </div>
</nav>
