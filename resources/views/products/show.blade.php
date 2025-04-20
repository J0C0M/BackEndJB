@extends('layouts.app')

@section('title', $product->name . ' - Webshop')

@section('content')
    <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600">
                    Home
                </a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('products.index') }}" class="ml-1 text-gray-700 hover:text-purple-600 md:ml-2">
                    Producten
                </a>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('products.by-category', $product->category->slug) }}" class="ml-1 text-gray-700 hover:text-purple-600 md:ml-2">
                    {{ $product->category->name }}
                </a>
            </li>
            <li aria-current="page" class="flex items-center">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-gray-500 md:ml-2">{{ $product->name }}</span>
            </li>
        </ol>
    </nav>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
            <div class="flex justify-center items-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-w-md rounded-lg object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg">
                        <span class="text-gray-500">Geen afbeelding beschikbaar</span>
                    </div>
                @endif
            </div>

            <div>
                <span class="inline-block bg-purple-100 text-purple-800 text-sm px-3 py-1 rounded-full mb-4">
                    {{ $product->category->name }}
                </span>

                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <div class="flex items-center mb-4">
                    <span class="text-2xl font-bold text-purple-600">€{{ number_format($product->price, 2) }}</span>
                </div>

                <div class="prose max-w-none mb-6 text-gray-700">
                    <p>{{ $product->description }}</p>
                </div>

                <div class="mb-6">
                    <div class="flex items-center">
                        <div class="text-sm text-gray-600 mr-4">Voorraad:</div>
                        @if($product->stock > 0)
                            <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">
                                {{ $product->stock }} op voorraad
                            </span>
                        @else
                            <span class="inline-block bg-red-100 text-red-800 text-sm px-3 py-1 rounded-full">
                                Niet op voorraad
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                        In winkelwagen
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Gerelateerde producten -->
    @if($relatedProducts->count() > 0)
        <section class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Gerelateerde producten</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                        @if($relatedProduct->image)
                            <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Geen afbeelding</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1">{{ $relatedProduct->name }}</h3>
                            <p class="text-gray-500 text-sm mb-2">{{ $relatedProduct->category->name }}</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-purple-600">€{{ number_format($relatedProduct->price, 2) }}</span>
                                <a href="{{ route('products.show', $relatedProduct->slug) }}" class="text-sm text-purple-600 hover:text-purple-800">
                                    Bekijk details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection
