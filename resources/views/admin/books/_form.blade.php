<form method="POST" action="{{ $action }}" style="background: white; padding: 25px; border: 1px solid #ddd; max-width: 600px; font-family: sans-serif; border-radius: 6px;">
    @csrf
    @isset($book)
        @method('PUT')
    @endisset

    @if ($errors->any())
        <div style="background: #fce8e6; border-left: 5px solid #c5221f; color: #c5221f; padding: 12px; margin-bottom: 20px; font-weight: bold; border-radius: 4px;">
            Исправьте ошибки в форме ({{ $errors->count() }})
        </div>
    @endif

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Название книги:</label>
        <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid {{ $errors->has('title') ? '#c5221f' : '#ddd' }}; border-radius: 4px;">
        @error('title') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Автор:</label>
        <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid {{ $errors->has('author') ? '#c5221f' : '#ddd' }}; border-radius: 4px;">
        @error('author') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Год издания:</label>
        <input type="number" name="year" value="{{ old('year', $book->year ?? 2000) }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid {{ $errors->has('year') ? '#c5221f' : '#ddd' }}; border-radius: 4px;">
        @error('year') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Цена (тг):</label>
        <input type="text" name="price" value="{{ old('price', $book->price ?? '') }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid {{ $errors->has('price') ? '#c5221f' : '#ddd' }}; border-radius: 4px;">
        @error('price') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Жанр книги:</label>
        <select name="genre_id" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="1" selected>Роман</option>
            <option value="2">Фэнтези</option>
        </select>
        @error('genre_id') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>

    <button type="submit" style="background: #1a73e8; color: white; border: none; padding: 10px 20px; font-size: 16px; font-weight: bold; border-radius: 4px; cursor: pointer;">Сохранить запись</button>
</form>