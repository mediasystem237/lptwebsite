<!-- resources/views/events.blade.php -->
@extends('layouts.app')

@section('title', 'Événements')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">Événements</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($events as $event)
        <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
            <p class="mb-2">{{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('d/m/Y H:i') }}</p>
            <p>{{ Str::limit($event->description, 100) }}</p>
        </div>
        @endforeach
    </div>
    {{ $events->links() }} <!-- Pagination links -->
</div>
@endsection
