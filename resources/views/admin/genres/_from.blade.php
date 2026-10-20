<form method="POST" action="{{ $action }}" style="background: white; padding: 25px; border: 1px solid #ddd; max-width: 600px; font-family: sans-serif; border-radius: 6px;">
    @csrf @isset($genre) @method('PUT') @endisset
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Название жанра:</label>
        <input type="text" name="name" value="{{ old('name', $genre->name ?? '') }}" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">
        @error('name') <small style="color: #c5221f; font-weight: bold;">{{ $message }}</small> @enderror
    </div>
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Описание:</label>
        <textarea name="description" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">{{ old('description', $genre->description ?? '') }}</textarea>
    </div>
    <button type="submit" style="background: #2ecc71; color: white; border: none; padding: 10px 20px; font-weight: bold; border-radius: 4px; cursor: pointer;">Сохранить жанр</button>
</form>