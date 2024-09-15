<!-- resources/views/admin/officers/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<h1>Éditer un Officier</h1>
<form action="{{ route('admin.officers.update', $officer) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $officer->name }}" required>
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <input type="text" class="form-control" id="role" name="role" value="{{ $officer->role }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $officer->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @if($officer->image)
        <img src="{{ asset('storage/' . $officer->image) }}" alt="{{ $officer->name }}" class="mt-2" style="max-width: 200px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
