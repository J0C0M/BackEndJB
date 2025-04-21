@extends('layouts.admin')

@section('title', 'Contactberichten - Admin Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Contactberichten</h1>

        @if($contacts->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500">Geen berichten gevonden.</p>
            </div>
        @else
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
                    @foreach($contacts as $contact)
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
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-800">Bekijken</a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Verwijderen</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
@endsection
