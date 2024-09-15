@extends('layouts.admin')

@section('title', 'Gestion des Événements')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="text-2xl font-bold mb-4">Gestion des Événements</h1>
    <button id="openModalButton" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter un événement
    </button>

    <table class="w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Heure</th>
                <th class="px-4 py-2">Lieu</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td class="border px-4 py-2">{{ $event->title }}</td>
                <td class="border px-4 py-2">{{ $event->date->format('d/m/Y') }}</td>
                <td class="border px-4 py-2">{{ $event->time->format('H:i') }}</td>
                <td class="border px-4 py-2">{{ $event->location }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.events.edit', $event) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modale pour la création d'un événement -->
<div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h5 class="text-lg font-semibold">Créer un Nouvel Événement</h5>
            <button id="closeModalButton" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Titre -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date -->
            <div class="mb-6">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input id="date" name="date" type="date" value="{{ old('date') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Heure -->
            <div class="mb-6">
                <label for="time" class="block text-sm font-medium text-gray-700">Heure</label>
                <input id="time" name="time" type="time" value="{{ old('time') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('time')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lieu -->
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700">Lieu</label>
                <input id="location" name="location" type="text" value="{{ old('location') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('location')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input id="image" name="image" type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons d'action -->
            <div class="flex items-center justify-end space-x-4">
                <button type="submit" name="action" value="save" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Sauvegarder comme Brouillon
                </button>
                <button type="submit" name="action" value="publish" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Publier
                </button>
                <button type="button" id="closeModalButton2" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/40cd0g370r5f6qps57ivx3qmkkcvwjejryxxo159aw5o3ruo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#content',
    plugins: 'code table lists link image',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image code',
    height: 500,
    menubar: false,
    image_caption: true,
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });

  // Open Modal
  document.getElementById('openModalButton').addEventListener('click', function() {
    document.getElementById('eventModal').classList.remove('hidden');
  });

  // Close Modal
  document.querySelectorAll('#closeModalButton, #closeModalButton2').forEach(button => {
    button.addEventListener('click', function() {
      document.getElementById('eventModal').classList.add('hidden');
    });
  });
</script>
@endsection
