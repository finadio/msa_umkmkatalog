@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
        <p class="text-sm text-gray-500">Kategori: {{ $product->category->name }}</p>
    </div>
</div>
@endsection
