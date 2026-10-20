@extends('layouts.app')
@section('title', 'Вход в систему')
@section('content')
    <div style="max-width: 450px; margin: 0 auto; font-family: sans-serif;">
        <h2>Вход в библиотечную систему</h2>
        <form method="POST" action="{{ route('login') }}" style="background: white; padding: 20px; border: 1px solid #ddd; border-radius: 6px;">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px;">E-mail:</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width:100%; padding:8px; border: 1px solid {{ $errors->has('email') ? '#ff4a4a' : '#ddd' }}; border-radius:4px;">
                @error('email') <small style="color:#ff4a4a;">{{ $message }}</small> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px;">Пароль:</label>
                <input type="password" name="password" style="width:100%; padding:8px; border: 1px solid #ddd; border-radius:4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label><input type="checkbox" name="remember"> Запомнить меня</label>
            </div>
            <button type="submit" style="width:100%; background:#1a73e8; color:white; border:none; padding:10px; font-weight:bold; border-radius:4px; cursor:pointer;">Войти</button>
        </form>
    </div>
@endsection