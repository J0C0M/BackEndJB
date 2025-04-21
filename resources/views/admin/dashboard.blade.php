<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-800 mb-2">Producten</h2>
                <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Product::count() }}</p>
                <div class="mt-4">
                    <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800">Bekijk alle producten →</a>
                </div>
            </div>

            <div class="bg-purple-100 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-purple-800 mb-2">Categorieën</h2>
                <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Category::count() }}</p>
            </div>

            <div class="bg-green-100 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-green-800 mb-2">Gebruikers</h2>
                <p class="text-3xl font-bold text-green-600">{{ \App\Models\User::count() }}</p>
            </div>
        </div>
    </div>
@endsection
