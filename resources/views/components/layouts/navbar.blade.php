<nav class="bg-white rounded-full shadow-md mb-6 sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-8 py-3 rounded-full">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img class="h-10 w-10" src="{{ asset('storage/banks/AH-2.png') }}" alt="Logo">
            <span class="font-bold text-2xl tracking-wide text-gray-900">DARION</span>
        </div>
        <!-- Menu -->
        <nav class="hidden md:flex space-x-12 text-base font-medium">
            <a href="/user" class="hover:text-blue-600 transition {{ request()->is('user') ? 'text-blue-600' : 'text-gray-700' }}">Home</a>
            <a href="/user/products" class="hover:text-blue-600 transition {{ request()->is('user/products') ? 'text-blue-600' : 'text-gray-700' }}">Shop</a>
            <a href="#" class="hover:text-blue-600 transition text-gray-700">Product</a>
            <a href="#" class="hover:text-blue-600 transition text-gray-700">Blog</a>
            <a href="#" class="hover:text-blue-600 transition text-gray-700">Featured</a>
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
            <a href="/login" class="relative hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>
            @endguest
            <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="hover:text-blue-600 transition focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75a.75.75 0 01-.75.75h-13.5a.75.75 0 01-.75-.75v-.75z" />
                    </svg>
                </button>
                <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border z-50">
                    <a href="/user/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                    <form action="/logout" method="post" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
