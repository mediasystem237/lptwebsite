<section class="bg-gray-50 py-16">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center p-6 rounded-lg shadow-md bg-white">
        <!-- Image Section -->
        <div class="flex justify-center lg:justify-end">
            <div class="w-full max-w-md lg:max-w-none lg:w-96 overflow-hidden rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <img src="{{ asset('images/jesus.jpg') }}" alt="Présentation de l'Église" class="w-full h-full object-cover"/>
            </div>
        </div>
        
        <!-- Texte Section -->
        <div class="flex flex-col items-start">
            <h2 class="text-4xl font-bold mb-4 text-blue-600 leading-tight">
                Light & Perfection Tabernacle
            </h2>
            <p class="mb-4 text-lg text-gray-700 leading-relaxed">
                Nous sommes la communauté de Light and Perfection Tabernacle, une église dédiée à la diffusion du message de William Branham. Nous croyons en la puissance de la foi et en l'amour de Dieu pour guider nos vies et notre communauté. Notre mission est d'apporter la lumière et la perfection à travers les enseignements, les prières, et les actions de charité.
            </p>
            <p class="mb-4 text-lg text-gray-700 leading-relaxed">
                Nous nous engageons à offrir un lieu de culte chaleureux et accueillant pour tous ceux qui cherchent à grandir spirituellement et à se connecter avec Dieu. Rejoignez-nous pour nos réunions hebdomadaires et découvrez la joie de la communauté chrétienne.
            </p>
            <p class="text-lg font-semibold text-blue-500 italic leading-relaxed mb-4">
                "Et le Seigneur dit : Je te montrerai ce que tu dois faire. Va vers cette ville et je te montrerai ce que tu dois faire." – Actes 9:6
            </p>
            <a href="{{ route('about') }}" class="bg-blue-600 text-white px-6 py-3 rounded-full shadow hover:bg-blue-700 transition">En savoir plus</a>
        </div>
    </div>
</section>
