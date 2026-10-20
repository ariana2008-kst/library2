@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
    <div style="max-width: 450px; margin: 0 auto; font-family: sans-serif;">
        <h2>Регистрация нового пользователя</h2>
        <form method="POST" action="{{ route('register') }}" style="background: white; padding: 20px; border: 1px solid #ddd; border-radius: 6px;">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px;">Имя:</label>
                <input type="text" name="name" value="{{ old('name') }}" style="width:100%; padding:8px; border: 1px solid {{ $errors->has('name') ? '#ff4a4a' : '#ddd' }}; border-radius:4px;">
                @error('name') <small style="color:#ff4a4a;">{{ $message }}</small> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px;">E-mail:</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width:100%; padding:8px; border: 1px solid {{ $errors->has('email') ? '#ff4a4a' : '#ddd' }}; border-radius:4px;">
                @error('email') <small style="color:#ff4a4a;">{{ $message }}</small> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px;">Пароль (мин. 8 символов):</label>
                <input type="password" name="password" style="width:100%; padding:8px; border: 1px solid {{ $errors->has('password') ? '#ff4a4a' : '#ddd' }}; border-radius:4px;">
                @error('password') <small style="color:#ff4a4a;">{{ $message }}</small> @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:5px;">Подтверждение пароля:</label>
                <input type="password" name="password_confirmation" style="width:100%; padding:8px; border: 1px solid #ddd; border-radius:4px;">
            </div>
            <button type="submit" style="width:100%; background:#2ecc71; color:white; border:none; padding:10px; font-weight:bold; border-radius:4px; cursor:pointer;">Зарегистрироваться</button>
        </form>
    </div>
@endsection