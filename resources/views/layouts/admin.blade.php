<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Webshop')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex">
<!-- Sidebar -->
<aside class="w-64 bg-gray-800 text-white p-6 hidden md:block">
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Admin Panel</h1>
    </div>

    <nav>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700' : '' }}">
                    Producten beheren
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700' : '' }}">
                    Categorieën beheren
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                    Naar website
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block py-2 px-4 rounded hover:bg-gray-700">
                    Uitloggen
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    <header class="bg-white shadow">
        <div class="p-4 flex justify-between items-center">
            <div>
                <span class="text-gray-800">Welkom, {{ Auth::user()->name }}</span>
            </div>
        </div>
    </header>

    <main class="flex-1 p-6">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white p-4 shadow mt-auto">
        <div class="text-center text-gray-600 text-sm">
            &copy; {{ date('Y') }} Webshop Admin Panel
        </div>
    </footer>
</div>
</body>
</html>
