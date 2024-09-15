<!-- resources/views/contact.blade.php -->
@extends('layouts.app')

@section('title', 'Contactez-nous')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Contactez-nous</h1>
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
            <textarea id="message" name="message" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
        </div>
    </form>
</div>
@endsection
