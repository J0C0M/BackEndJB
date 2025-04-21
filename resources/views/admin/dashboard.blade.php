@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
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

            <div class="bg-yellow-100 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-yellow-800 mb-2">Contactberichten</h2>
                <p class="text-3xl font-bold text-yellow-600">{{ \App\Models\Contact::count() }}</p>
                <div class="mt-2">
                    <span class="inline-block px-2 py-1 text-xs rounded bg-yellow-200 text-yellow-800">
                        {{ \App\Models\Contact::where('read', false)->count() }} nieuw
                    </span>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.contacts.index') }}" class="text-yellow-600 hover:text-yellow-800">Bekijk alle berichten →</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Recente contactberichten</h2>
            <a href="{{ route('admin.contacts.index') }}" class="text-purple-600 hover:text-purple-800">Alle berichten bekijken</a>
        </div>

        @if(\App\Models\Contact::count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Naam</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Onderwerp</th>
                        <th class="py-2 px-4 border-b">Datum</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Contact::orderBy('created_at', 'desc')->take(5)->get() as $contact)
                        <tr class="{{ $contact->read ? '' : 'font-bold bg-blue-50' }}">
                            <td class="py-2 px-4 border-b">{{ $contact->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $contact->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $contact->subject }}</td>
                            <td class="py-2 px-4 border-b">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($contact->read)
                                    <span class="inline-block px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">Gelezen</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs rounded bg-blue-100 text-blue-800">Nieuw</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-800">Bekijken</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">Geen berichten gevonden.</p>
            </div>
        @endif
    </div>
@endsection
