@extends('layouts.app')

@section('title', 'À propos de Nous')
@section('meta_description', 'Découvrez l\'histoire, la mission, les valeurs, et l\'équipe de Light and Perfection Tabernacle, une église dynamique dédiée à la diffusion du message de William Branham.')
@section('meta_keywords', 'église, Light and Perfection Tabernacle, William Branham, mission, valeurs, histoire, équipe, témoignages')

@section('content')

<!-- Section Bannière Hero -->
<section class="relative bg-cover bg-center h-[500px] flex items-center justify-center text-center text-white" style="background-image: url('{{ asset('images/hero.jpg') }}');">
    <div class="bg-black bg-opacity-50 w-full h-full absolute inset-0"></div>
    <div class="relative z-10">
        <h1 class="text-5xl font-bold mb-4">Bienvenue à Light and Perfection Tabernacle</h1>
        <p class="text-xl mb-6">Un lieu où la lumière et la perfection se rencontrent.</p>
        <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full shadow-lg transition">Assister à un Service</a>
    </div>
</section>

<!-- Présentation de l'Église -->
<section class="bg-white py-16 px-4">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4 text-blue-600">Qui Nous Sommes</h2>
        <p class="text-gray-700 text-lg leading-relaxed max-w-3xl mx-auto">
            Light and Perfection Tabernacle est une église dédiée à la diffusion du message de William Branham. Nous croyons en la puissance de la foi et en l'amour de Dieu pour guider nos vies et notre communauté. Notre mission est d'apporter la lumière et la perfection à travers les enseignements, les prières, et les actions de charité.
        </p>
    </div>
</section>

<!-- Notre Histoire -->
<section class="bg-gray-50 py-16 px-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Notre Histoire</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-center">
                <img src="{{ asset('images/history.jpg') }}" alt="Notre Histoire" class="rounded-lg shadow-lg w-full object-cover">
            </div>
            <div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Depuis sa création, Light and Perfection Tabernacle a été un phare de lumière et d'espoir pour notre communauté. Fondée sur les enseignements de William Branham, notre église a grandi et s'est développée en devenant un lieu où la foi est vécue de manière authentique.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Au fil des années, nous avons touché de nombreuses vies et continuons à être un lieu d'accueil pour tous ceux qui cherchent à approfondir leur relation avec Dieu.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Équipe -->
<section class="bg-white py-16 px-4">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">Rencontrez Notre Équipe</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($teamMembers as $member)
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <img src="{{ asset('images/team/' . $member->photo) }}" alt="{{ $member->name }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow-lg">
                    <h3 class="text-xl font-semibold">{{ $member->name }}</h3>
                    <p class="text-blue-500">{{ $member->role }}</p>
                    <p class="text-gray-600 mt-2">{{ $member->bio }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Nos Valeurs -->
<section class="bg-gray-50 py-16 px-4">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">Nos Valeurs</h2>
        <ul class="list-disc list-inside text-left mx-auto max-w-3xl text-lg text-gray-700">
            <li>Foi en la puissance de la Parole de Dieu</li>
            <li>Engagement envers le message de William Branham</li>
            <li>Service envers notre communauté avec amour et compassion</li>
            <li>Recherche constante de la perfection spirituelle</li>
        </ul>
    </div>
</section>

<!-- Témoignages -->
<section class="bg-white py-16 px-4">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">Témoignages</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide p-6 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-lg italic text-gray-700">"{{ $testimonial->message }}"</p>
                        <p class="mt-4 font-semibold text-blue-500">{{ $testimonial->name }}</p>
                        <p class="text-gray-500">{{ $testimonial->role }}</p>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Section FAQ -->
<section class="bg-gray-50 py-16 px-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">FAQ - Questions Fréquemment Posées</h2>
        <div class="space-y-4">
            @foreach ($faqs as $faq)
                <div x-data="{ open: false }" class="border-b border-gray-200 py-4">
                    <h3 class="text-xl font-semibold cursor-pointer flex justify-between items-center" @click="open = !open">
                        {{ $faq->question }}
                        <span x-show="!open">+</span>
                        <span x-show="open">-</span>
                    </h3>
                    <div x-show="open" class="mt-2 text-gray-600">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Appel à l'Action -->
<section class="bg-blue-600 py-16 text-white text-center">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold mb-4">Rejoignez-nous dans notre mission</h2>
        <p class="mb-6 text-lg">Participez à l'un de nos services, rejoignez un groupe d'étude ou inscrivez-vous pour nos événements à venir.</p>
        <a href="{{ route('events') }}" class="bg-white text-blue-600 px-6 py-3 rounded-full shadow-lg hover:bg-gray-200 transition">En savoir plus</a>
    </div>
</section>

@endsection
