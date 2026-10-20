@extends('layouts.admin')

@section('title', 'Добавление книги')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.books.index') . '?key=secret123' }}" style="text-decoration: none; color: #1a73e8; font-weight: bold;">← Назад к списку фонда</a>
    </div>
    
    <h2>Регистрация новой книги в реестре</h2>
    @include('admin.books._form', ['action' => route('admin.books.store') . '?key=secret123'])
@endsection