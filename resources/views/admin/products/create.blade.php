<!-- resources/views/admin/products/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Nieuw product toevoegen')

@section('content')
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
            terug
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Nieuw product toevoegen</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Productnaam</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Beschrijving</label>
                <textarea name="description" id="description" rows="4" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prijs (€)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categorie</label>
                    <select name="category_id" id="category_id" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        <option value="">Selecteer een categorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Voorraad</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Afbeelding</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                <p class="text-xs text-gray-500 mt-1">PNG, JPG of JPEG. Max 2MB.</p>
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="featured" id="featured" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" {{ old('featured') ? 'checked' : '' }}>
                    <label for="featured" class="ml-2 block text-sm text-gray-700">Product uitlichten op homepage</label>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg mr-2">
                    Annuleren
                </a>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg">
                    Product opslaan
                </button>
            </div>
        </form>
    </div>
@endsection
