@extends('layouts.admin')

@section('title', 'Paramètres')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="text-2xl font-bold mb-4">Paramètres du site</h1>
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="church_name">
                Nom de l'église
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="church_name" type="text" name="church_name" value="{{ old('church_name', $settings['church_name'] ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="church_description">
                Description de l'église
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="church_description" name="church_description" rows="3">{{ old('church_description', $settings['church_description'] ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="contact_email">
                Email de contact
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact_email" type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="contact_phone">
                Téléphone de contact
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact_phone" type="tel" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                Adresse
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" name="address" rows="3">{{ old('address', $settings['address'] ?? '') }}</textarea>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Enregistrer les paramètres
            </button>
        </div>
    </form>
</div>
@endsection
