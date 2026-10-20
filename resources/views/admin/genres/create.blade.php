@extends('layouts.admin')
@section('title', 'Создать жанр')
@section('content')
    <h2>Создание нового жанра литературы</h2>
    @include('admin.genres._form', ['action' => route('admin.genres.store') . '?key=secret123'])
@endsection