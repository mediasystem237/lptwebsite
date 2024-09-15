<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Bande de droite -->
        <div class="hidden lg:flex flex-col bg-gray-900 text-white p-6 justify-center items-center w-1/2 lg:w-5/12 xl:w-45%">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-48 h-48 mb-6">
            <h1 class="text-2xl font-bold mb-4">Welcome to {{ config('app.name', 'LIGHT &  PERFECTION TABERNACLE') }}</h1>
            <p class="text-lg">Your tagline or description goes here.</p>
        </div>

        <!-- Formulaire -->
        <div class="w-full lg:w-1/2 xl:w-1/3 mx-auto my-auto p-6">
            <div class="bg-white shadow-md rounded-lg p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
