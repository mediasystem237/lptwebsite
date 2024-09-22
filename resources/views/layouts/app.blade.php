<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Description par défaut de votre site')">
    <meta name="keywords" content="@yield('meta_keywords', 'mots-clés, par, défaut')">
    <title>@yield('title', 'Nom de votre site')</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 font-sans">
    <x-header/>

    <main>
        @yield('content')
    </main>

    <x-footer/>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

</html>
