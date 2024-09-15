<!-- resources/views/admin/officers/create.blade.php -->
@extends('layouts.admin')

@section('content')
<h1>Ajouter un Officier</h1>
<form action="{{ route('admin.officers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <input type="text" class="form-control" id="role" name="role" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
