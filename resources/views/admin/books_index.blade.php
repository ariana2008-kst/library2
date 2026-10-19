@extends('layouts.admin')

@section('title', 'Учет книг')

@section('content')
    <h1>Учет книжного фонда (Панель сотрудника)</h1>
    
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Название книги</th>
                <th>Автор</th>
                <th>Год издания</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $id => $item)
                <tr>
                    <td>{{ $id }}</td>
                    <td><strong>{{ $item['title'] }}</strong></td>
                    <td>{{ $item['author'] }}</td>
                    <td>{{ $item['year'] }} г.</td>
                    <td>
                        @if ($loop->first)
                            <span class="new-badge">новая</span>
                        @else
                            <span>учете</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection