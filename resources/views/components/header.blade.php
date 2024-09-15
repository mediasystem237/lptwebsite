<header class="bg-blue-600 text-white">
    <nav class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold mb-4 md:mb-0">LPT</a>
        <button class="md:hidden text-white focus:outline-none" aria-label="Toggle navigation">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <ul class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-4 md:mt-0 hidden md:flex">
            <li><a href="{{ route('home') }}" class="hover:underline">Accueil</a></li>
            <li><a href="{{ route('about') }}" class="hover:underline">À propos</a></li>
            <li><a href="{{ route('officers') }}" class="hover:underline">Officiers</a></li>
            <li><a href="{{ route('articles') }}" class="hover:underline">Articles</a></li>
            <li><a href="{{ route('events') }}" class="hover:underline">Événements</a></li>
            <li><a href="{{ route('contact') }}" class="hover:underline">Contact</a></li>
        </ul>
    </nav>
</header>
