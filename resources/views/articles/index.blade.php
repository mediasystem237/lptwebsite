<!-- resources/views/articles/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Articles Publiés</h1>

    @if($articles->isEmpty())
        <p>Aucun article publié.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mt-2 mb-4 rounded-md">
                    @endif
                    <p class="text-gray-700">{{ Str::limit($article->content, 150) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="text-indigo-600 hover:underline mt-4 inline-block">Lire la suite</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
