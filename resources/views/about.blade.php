<!-- resources/views/about.blade.php -->
@extends('layouts.app')

@section('title', 'À propos')
@section('meta_description', 'Découvrez l\'histoire, la mission et les valeurs de Light and Perfection Tabernacle, une église engagée dans le message de William Branham.')
@section('meta_keywords', 'église, Light and Perfection Tabernacle, William Branham, mission, valeurs, histoire')


@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">À propos de Light and Perfection Tabernacle</h1>
    <p class="mb-4">{{ $settings['church_description'] ?? 'Description détaillée de l\'église' }}</p>
    
    <h2 class="text-2xl font-bold mb-4">Notre histoire</h2>
    <p class="mb-4">
        Light and Perfection Tabernacle fait partie de la communauté des églises du message de William Branham. 
        Notre église a été fondée avec la vision de répandre la lumière de l'Évangile et de rechercher la perfection en Christ.
    </p>
    
    <h2 class="text-2xl font-bold mb-4">Notre mission</h2>
    <p class="mb-4">
        Notre mission est de propager le message de William Branham, de nourrir spirituellement notre congrégation, 
        et d'être un phare de lumière et de vérité dans notre communauté.
    </p>
    
    <h2 class="text-2xl font-bold mb-4">Nos valeurs</h2>
    <ul class="list-disc list-inside mb-4">
        <li>Foi profonde en la Parole de Dieu</li>
        <li>Engagement envers le message de William Branham</li>
        <li>Amour et service envers notre communauté</li>
        <li>Recherche continue de la perfection spirituelle</li>
    </ul>
</div>
@endsection