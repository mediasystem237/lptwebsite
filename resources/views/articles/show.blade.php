<!-- resources/views/articles/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mb-4 rounded-md">
    @endif
    <div class="text-gray-700 mb-4">
        {!! $article->content !!}
    </div>
    <a href="{{ route('articles.index') }}" class="text-indigo-600 hover:underline">Retour à la liste des articles</a>
</div>
@endsection
