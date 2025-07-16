<nav class="bg-white shadow-md mb-6 sticky top-0 z-50 rounded-b-2xl">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-3">
        <!-- Logo - Pojok Kiri Banget -->
        <div class="flex items-center space-x-2">
            <img class="h-12 w-auto rounded bg-white shadow" src="/img/msa.png" alt="UMKM MSA Logo">
            <span class="font-bold text-xl md:text-2xl tracking-wide text-blue-800">UMKM MSA</span>
        </div>
        
        <!-- Menu Navigation - Tengah -->
        <nav class="hidden md:flex items-center space-x-8 text-base font-medium">
            <a href="/" class="hover:text-blue-600 transition duration-200 px-3 py-2 rounded-md hover:bg-blue-50 {{ request()->is('/') ? 'text-blue-700 font-bold bg-blue-50' : 'text-gray-700' }}">
                Beranda
            </a>
            <a href="/umkm" class="hover:text-blue-600 transition duration-200 px-3 py-2 rounded-md hover:bg-blue-50 {{ request()->is('umkm*') ? 'text-blue-700 font-bold bg-blue-50' : 'text-gray-700' }}">
                UMKM
            </a>
            <a href="/products" class="hover:text-blue-600 transition duration-200 px-3 py-2 rounded-md hover:bg-blue-50 {{ request()->is('products*') ? 'text-blue-700 font-bold bg-blue-50' : 'text-gray-700' }}">
                Produk
            </a>
        </nav>
        
        <!-- Search dan User Actions - Pojok Kanan Banget -->
        <div class="flex items-center space-x-1">
            <!-- Search Bar dengan Button (Gabungan) -->
            <div class="hidden md:flex items-center bg-gray-50 rounded-lg border border-gray-200 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500">
                <form action="/search" method="GET" class="flex items-center">
                    <input type="text" name="q" placeholder="Cari produk..." class="bg-transparent px-3 py-2 text-sm focus:outline-none w-48 placeholder-gray-500">
                    <button type="submit" class="px-3 py-2 text-gray-400 hover:text-blue-600 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </button>
                </form>
            </div>
            
            <!-- Mobile Search Button -->
            <button class="md:hidden hover:text-blue-600 transition duration-200 p-2 rounded-md hover:bg-blue-50" onclick="toggleSearch()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>
            
            <!-- Cart (untuk user yang sudah login) -->
            @auth
            <a href="{{ route('user.cart') }}" class="relative hover:text-blue-600 transition duration-200 p-2 rounded-md hover:bg-blue-50">
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
                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                        {{ $cartcount }}
                    </span>
                @endif
            </a>
            @endauth
            
            <!-- User Profile Dropdown -->
            <div class="relative dropdown">
                <button class="hover:text-blue-600 transition duration-200 p-2 rounded-md hover:bg-blue-50" onclick="toggleUserMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="user-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">
                    @guest
                        <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0V5.25m0 0A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0h-9m9 0v10.5A2.25 2.25 0 0115.75 21h-7.5A2.25 2.25 0 016 19.5V9m9 0H6" />
                            </svg>
                            Login
                        </a>
                        <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            Register
                        </a>
                    @endguest
                    
                    @auth
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275Z" />
                            </svg>
                            Profile
                        </a>
                        <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 1-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m6-9.75a3 3 0 0 1 6 0v1.5m-6-1.5a3 3 0 0 1 6 0v1.5m-6-1.5v1.5m6-1.5v1.5m-3.75 0h.008v.008H12v-.008Z" />
                            </svg>
                            Pesanan Saya
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0V5.25m0 0A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0h-9m9 0v10.5A2.25 2.25 0 0115.75 21h-7.5A2.25 2.25 0 016 19.5V9m9 0H6" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden hover:text-blue-600 transition duration-200 p-2 rounded-md hover:bg-blue-50" onclick="toggleMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Search Bar (Hidden by default) -->
    <div id="search-bar" class="hidden md:hidden border-t border-gray-200 px-4 py-3">
        <div class="relative">
            <form action="/search" method="GET">
                <input type="text" name="q" placeholder="Cari produk atau UMKM..." class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="absolute right-2 top-2 text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
        <div class="px-4 py-2 space-y-1">
            <a href="/" class="block px-3 py-2 text-base font-medium {{ request()->is('/') ? 'text-blue-700 bg-blue-50' : 'text-gray-700' }} hover:text-blue-600 hover:bg-blue-50 rounded-md">
                Beranda
            </a>
            <a href="/umkm" class="block px-3 py-2 text-base font-medium {{ request()->is('umkm*') ? 'text-blue-700 bg-blue-50' : 'text-gray-700' }} hover:text-blue-600 hover:bg-blue-50 rounded-md">
                UMKM
            </a>
            <a href="/products" class="block px-3 py-2 text-base font-medium {{ request()->is('products*') ? 'text-blue-700 bg-blue-50' : 'text-gray-700' }} hover:text-blue-600 hover:bg-blue-50 rounded-md">
                Produk
            </a>
        </div>
    </div>
</nav>

<style>
    /* Custom dropdown styles */
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    
    .dropdown-menu {
        display: none;
    }
</style>

<script>
    function toggleSearch() {
        const searchBar = document.getElementById('search-bar');
        searchBar.classList.toggle('hidden');
    }
    
    function toggleUserMenu() {
        const userMenu = document.getElementById('user-menu');
        userMenu.classList.toggle('hidden');
    }
    
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const userMenu = document.getElementById('user-menu');
        const dropdown = event.target.closest('.dropdown');
        
        if (!dropdown && !userMenu.classList.contains('hidden')) {
            userMenu.classList.add('hidden');
        }
    });
</script>