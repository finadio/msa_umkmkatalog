<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Heroicons (SVG, bisa digunakan inline di komponen) -->
    <!-- Flowbite, SweetAlert2, Trix Editor, Favicon, dan Vite tetap -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <link rel="icon" href="{{ asset('storage/banks/favicon123.ico') }}" type="image/x-icon">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        body, html { font-family: 'Inter', sans-serif; }
        trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
    </style>
    <title>Katalog UMKM MSA</title>
</head>

<body>
    <div class="antialiased bg-gray-50">
        <x-dashboard.navbar></x-dashboard.navbar>

        <!-- Sidebar -->
        <x-dashboard.sidebar></x-dashboard.sidebar>

        <x-dashboard.header>{{ $title }}</x-dashboard.header>

        <main class="p-4 md:ml-64 h-auto bg-gray-100">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
