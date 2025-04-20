@extends('layouts.app')

@section('title', 'Home - Webshop')

@section('content')
    <div class="relative">
        <div class="h-96 bg-gradient-to-r from-purple-600 to-purple-900 rounded-lg flex items-center">
            <div class="container mx-auto px-8">
                <h1 class="text-4xl md:text-5xl text-white font-bold mb-4">Welkom bij onze Webshop</h1>
                <p class="text-xl text-purple-100 mb-8">Ontdek de beste producten voor de beste prijzen.</p>
                <a href="{{ route('products.index') }}" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Bekijk onze producten
                </a>
            </div>
        </div>
    </div>

    <section class="mt-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Uitgelichte producten</h2>
            <a href="{{ route('products.index') }}" class="text-purple-600 hover:text-purple-800">Alle producten bekijken</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Geen afbeelding</span>
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm mb-2">{{ $product->category->name }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-purple-600">€{{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product->slug) }}" class="text-sm text-purple-600 hover:text-purple-800">
                                Bekijk details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Geen uitgelichte producten gevonden.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="mt-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Nieuwste producten</h2>
            <a href="{{ route('products.index') }}" class="text-purple-600 hover:text-purple-800">Alle producten bekijken</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($latestProducts as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Geen afbeelding</span>
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm mb-2">{{ $product->category->name }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-purple-600">€{{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product->slug) }}" class="text-sm text-purple-600 hover:text-purple-800">
                                Bekijk details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Geen nieuwe producten gevonden.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
