<section class="bg-gray-100 py-16 w-full">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Nos Programmes</h2>
        
        <div class="flex flex-col lg:flex-row lg:space-x-8 gap-8">
            <!-- Dimanche -->
            <div class="bg-white rounded-lg shadow-lg w-full lg:w-1/3">
                <img src="{{ asset('images/programs.jpg') }}" alt="Dimanche" class="w-full h-48 object-cover rounded-t-lg"/>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Dimanche</h3>
                    <p class="mb-4">Ecole du dimanche : 7h00 à 9h00</p>
                    <p class="mb-4">Culte : 09h30 à 12h30</p>
                    <p>(diffusé en Live) 🔴</p>
                </div>
            </div>
            
            <!-- Mercredi -->
            <div class="bg-white rounded-lg shadow-lg w-full lg:w-1/3">
                <img src="{{ asset('images/programs.jpg') }}" alt="Mercredi" class="w-full h-48 object-cover rounded-t-lg"/>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Mercredi</h3>
                    <p class="mb-4">Enseignement : 17h à 19h30</p>
                </div>
            </div>
            
            <!-- Jeudi -->
            <div class="bg-white rounded-lg shadow-lg w-full lg:w-1/3">
                <img src="{{ asset('images/programs.jpg') }}" alt="Jeudi" class="w-full h-48 object-cover rounded-t-lg"/>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Jeudi</h3>
                    <p class="mb-4">Soirée de prière : 17h à 19h30</p>
                </div>
            </div>
        </div>
    </div>
</section>
