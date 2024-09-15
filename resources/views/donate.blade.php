<!-- resources/views/donate.blade.php -->

@extends('layouts.app')

@section('title', 'Faire une Offrande')

@section('content')
<section class="relative h-[400px] bg-cover bg-center" style="background-image: url('{{ asset('images/donate-hero.jpg') }}');">
    <div class="flex items-center justify-center h-full bg-blue-600 bg-opacity-50">
        <div class="text-center text-white px-6 py-4 bg-blue-700 bg-opacity-75 rounded-lg">
            <h1 class="text-4xl font-bold mb-4">Faire une Offrande</h1>
            <p class="text-lg mb-4">Votre générosité aide notre mission et soutient nos projets. Merci pour votre soutien.</p>
            <a href="{{ route('donate') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow hover:bg-gray-200">Faire un don</a>
        </div>
    </div>
</section>

<section class="py-16 bg-white text-gray-800">
    <div class="container mx-auto px-4">

        <div class="flex flex-col lg:flex-row items-center justify-between">
            <!-- Image de dons -->
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <img src="{{ asset('images/donation.jpg') }}" alt="Faire une offrande" class="w-full h-auto rounded-lg shadow-md">
            </div>

            <!-- Informations de dons -->
            <div class="lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4">Comment faire une offrande</h2>
                <p class="mb-4">Nous apprécions grandement votre soutien. Voici les différentes manières dont vous pouvez faire une offrande :</p>

                <ul class="list-disc list-inside mb-6">
                    <li><strong>Virement bancaire :</strong> Transférez vos dons au compte suivant :</li>
                    <ul class="list-inside mb-4">
                        <li>Banque : XYZ Bank</li>
                        <li>IBAN : FR1234567890123456789012345</li>
                        <li>BIC : XYZFRPP</li>
                    </ul>
                    <li><strong>Par chèque :</strong> Envoyez votre chèque à l'adresse suivante :</li>
                    <p class="mb-4">Église Light and Perfection Tabernacle, 123 Rue de la Foi, 75000 Paris</p>
                    <li><strong>En ligne :</strong> Faites un don en ligne via notre plateforme sécurisée :</li>
                    <a href="https://www.example.com/donate" class="text-blue-600 hover:underline">Faire un don en ligne</a>
                </ul>

                <p class="mb-6">Pour toute question ou information supplémentaire, veuillez nous contacter à l'adresse <a href="mailto:contact@lpt.com" class="text-blue-600 hover:underline">contact@lpt.com</a>.</p>

                <div class="text-center">
                    <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
