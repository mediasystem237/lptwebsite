<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<!-- Hero Section -->
@include('components.hero')


<!-- Hero Section -->
@include('components.aboutchurch')
<div class="bg-white shadow-md rounded-lg p-6">
    <p class="mb-4">{{ $settings['church_description'] ?? 'Description de l\'église' }}</p>
    
    <h2 class="text-2xl font-bold mb-4">Prochains événements</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($upcomingEvents as $event)
        <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
            <p class="mb-2">{{ $event->start_time->format('d/m/Y H:i') }}</p>
            <p>{{ Str::limit($event->description, 100) }}</p>
        </div>
        @endforeach
    </div>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">Derniers articles</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($latestArticles as $article)
        <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="text-xl font-bold mb-2">{{ $article->title }}</h3>
            <p class="mb-2">{{ $article->published_at->format('d/m/Y') }}</p>
            <p>{{ Str::limit($article->content, 100) }}</p>
        </div>
        @endforeach
    </div>
     <!-- Nos Programmes -->
     @include('components.programs')

    <section class="py-16 bg-blue-600 text-white text-center">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
        <!-- Texte inspirant avec le verset biblique -->
        <div class="lg:w-1/2 mb-8 lg:mb-0">
            <h2 class="text-3xl font-bold mb-4">Faire une Offrande</h2>
            <p class="text-lg mb-4">Votre générosité est une bénédiction pour notre communauté. En offrant, vous soutenez nos projets, nos missions et aidez à répandre l'amour et la foi. Nous vous remercions pour votre soutien constant et vos prières.</p>
            <p class="text-md italic mb-4">"Donne, et il te sera donné ; on versera dans ton sein une bonne mesure, tassée, secouée et débordante." - Luc 6:38</p>
            <a href="{{ route('donate') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow hover:bg-gray-200">Faire une offrande</a>
        </div>
        <!-- Image -->
        <div class="lg:w-1/2">
            <img src="{{ asset('images/don.jpg') }}" alt="Faire une offrande" class="w-full h-auto rounded-lg shadow-md">
        </div>
    </div>
</section>

</div>
@endsection