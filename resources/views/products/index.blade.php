@extends('layouts.app')

@section('title', 'Producten - Webshop')

@section('content')
    <div class="flex flex-col md:flex-row gap-8">
        <aside class="w-full md:w-64 mb-6 md:mb-0">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Categorieën</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('products.index') }}" class="text-purple-600 font-medium hover:text-purple-800">
                            Alle producten
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.by-category', $category->slug) }}" class="text-gray-700 hover:text-purple-600">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <div class="flex-1">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Alle Producten</h1>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
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
                        <p class="text-gray-500">Geen producten gevonden.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
