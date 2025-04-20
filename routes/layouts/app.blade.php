<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Webshop')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-purple-600">Webshop</a>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-purple-600">Producten</a>
            </nav>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-purple-600">Inloggen</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-purple-600">Registreren</a>
                @else
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-purple-600">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl hidden group-hover:block z-10">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Admin Dashboard</a>
                                <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Beheer Producten</a>
                            @endif

                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-purple-100"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
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

<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="mb-6 md:mb-0">
                <h2 class="text-xl font-bold mb-2">Webshop</h2>
                <p class="text-gray-400">De beste producten voor de beste prijzen.</p>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Producten</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Contact</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-400">info@webshop.nl</li>
                        <li class="text-gray-400">+31 123 456 789</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Webshop. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
</body>
</html>
