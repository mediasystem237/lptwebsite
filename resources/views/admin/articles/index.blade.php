@extends('layouts.admin')

@section('title', 'Gestion des Articles')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="text-2xl font-bold mb-4">Gestion des Articles</h1>
    <button id="openModalButton" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Ajouter un article
    </button>

    <table class="w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Publié</th>
                <th class="px-4 py-2">Date de publication</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td class="border px-4 py-2">{{ $article->title }}</td>
                <td class="border px-4 py-2">{{ $article->published ? 'Oui' : 'Non' }}</td>
                <td class="border px-4 py-2">{{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Non publié' }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block">
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

<!-- Inclure le modal ici -->
<div id="articleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h5 class="text-lg font-semibold">Créer un Nouvel Article</h5>
            <button id="closeModalButton" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Titre -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contenu -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea id="content" name="content" rows="10" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                @error('content')
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

            <!-- Statut -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                    <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publié</option>
                </select>
                @error('status')
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
    document.getElementById('articleModal').classList.remove('hidden');
  });

  // Close Modal
  document.querySelectorAll('#closeModalButton, #closeModalButton2').forEach(button => {
    button.addEventListener('click', function() {
      document.getElementById('articleModal').classList.add('hidden');
    });
  });
</script>
@endsection
