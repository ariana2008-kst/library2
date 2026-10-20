@extends('layouts.admin')
@section('title', 'Редактировать жанр')
@section('content')
    <h2>Редактирование жанра №{{ $genre->id }}</h2>
    @include('admin.genres._form', ['action' => route('admin.genres.update', $genre) . '?key=secret123'])
@endsection