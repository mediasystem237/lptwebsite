<!-- resources/views/officers.blade.php -->
@extends('layouts.app')

@section('title', 'Nos Officiers')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Nos Officiers</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($officers as $officer)
        <div class="bg-gray-100 p-4 rounded-lg">
            <img src="{{ $officer->image }}" alt="{{ $officer->name }}" class="w-full h-48 object-cover mb-4 rounded-lg" loading="lazy">
            <h3 class="text-xl font-bold mb-2">{{ $officer->name }}</h3>
            <p class="mb-2">{{ $officer->role }}</p>
            <p>{{ Str::limit($officer->description, 100) }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
