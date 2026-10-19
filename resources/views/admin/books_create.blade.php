@extends('layouts.admin')

@section('title', 'Добавление книги')

@section('content')
    <h1>Регистрация новой книги в фонде</h1>
    <form style="background: white; padding: 20px; border: 1px solid #ddd; max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Название книги:</label>
            <input type="text" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Автор:</label>
            <input type="text" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>
        <button type="button" style="background: #2cc71; color: white; padding: 10px 15px; border: none; font-weight: bold; cursor: pointer;">Внести в реестр</button>
    </form>
    <p style="margin-top: 20px;"><a href="{{ route('admin.books.index') . '?key=secret123' }}">← Вернуться к таблице учета</a></p>
@endsection