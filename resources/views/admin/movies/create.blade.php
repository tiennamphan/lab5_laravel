<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Movie</title>
</head>
<body>
    <h1>Create New Movie</h1>
    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="poster">Poster:</label>
            <input type="file" name="poster" id="poster">
        </div>
        <div>
            <label for="intro">Intro:</label>
            <input type="text" name="intro" id="intro" required>
        </div>
        <div>
            <label for="release_date">Release Date:</label>
            <input type="date" name="release_date" id="release_date" required>
        </div>
        <div>
            <label for="genre_id">Genre:</label>
            <select name="genre_id" id="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create Movie</button>
    </form>
</body>
</html>
