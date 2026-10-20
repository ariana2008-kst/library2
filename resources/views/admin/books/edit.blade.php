@extends('layouts.admin')

@section('title', 'Редактирование книги')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.books.index') . '?key=secret123' }}" style="text-decoration: none; color: #1a73e8; font-weight: bold;">← Отмена и возврат</a>
    </div>
    
    <h2>Редактирование книги №{{ $book->id }}</h2>
    @include('admin.books._form', ['action' => route('admin.books.update', $book) . '?key=secret123'])
@endsection