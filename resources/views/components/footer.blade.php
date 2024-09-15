<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Light and Perfection Tabernacle</h3>
                <p>Une église de la communauté du message de William Branham</p>
            </div>
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Horaires des réunions</h3>
                <ul>
                    <li>Mardi et Jeudi : 17h - 19h30</li>
                    <li>Dimanche : 9h - 12h30</li>
                </ul>
            </div>
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-bold mb-2">Contact</h3>
                <p>Email : {{ $settings['contact_email'] ?? 'contact@lpt.com' }}</p>
                <p>Téléphone : {{ $settings['contact_phone'] ?? '01 23 45 67 89' }}</p>
                <p>Adresse : {{ $settings['address'] ?? 'Adresse de l\'église' }}</p>
            </div>
        </div>
        <div class="mt-8 text-center">
            <p>&copy; {{ date('Y') }} Light and Perfection Tabernacle. Tous droits réservés.</p>
        </div>
    </div>
</footer>
