@extends('layouts.admin')

@section('title', 'Contactbericht bekijken - Admin Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Contactbericht bekijken</h1>
            <div class="flex space-x-3">
                <a href="{{ route('admin.contacts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Terug</a>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Verwijderen</button>
                </form>
            </div>
        </div>

        <div class="border rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-gray-500 text-sm">Naam</p>
                    <p class="font-semibold">{{ $contact->name }}</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="font-semibold">{{ $contact->email }}</p>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-gray-500 text-sm">Onderwerp</p>
                <p class="font-semibold">{{ $contact->subject }}</p>
            </div>

            <div class="mb-6">
                <p class="text-gray-500 text-sm">Bericht</p>
                <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                    <p>{{ $contact->message }}</p>
                </div>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Ontvangen op</p>
                <p>{{ $contact->created_at->format('d-m-Y H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection
