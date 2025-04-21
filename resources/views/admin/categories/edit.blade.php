<!-- resources/views/admin/categories/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Categorie bewerken')

@section('content')
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
            terug
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Categorie bewerken: {{ $category->name }}</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Categorienaam</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Beschrijving (optioneel)</label>
                <textarea name="description" id="description" rows="3" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('description', $category->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Wijzigingen opslaan
                </button>
            </div>
        </form>
    </div>
@endsection
