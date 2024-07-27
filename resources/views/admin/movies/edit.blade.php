<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chỉnh sửa phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container m-4">
        <h1>Chỉnh sửa phim</h1>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-primary">Danh sách</a>

        <form action="{{ route('admin.movies.update', $movie) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $movie->title }}" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                <input type="file" class="form-control" name="poster" id="poster">
                <br>
                @if ($movie->poster)
                    <img id="img" src="{{ asset('/storage/' . $movie->poster) }}" width="60" alt="{{ $movie->title }}">
                @else
                    <p>No image</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="intro" class="form-label">Intro</label>
                <textarea class="form-control" name="intro" rows="3" required>{{ $movie->intro }}</textarea>
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date->format('d-m-Y') }}" required>
            </div>
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select name="genre_id" class="form-select" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>

    <script>
        var fileInput = document.querySelector('#poster');
        var img = document.querySelector('#img');

        // Thay đổi ảnh
        fileInput.addEventListener('change', function(e) {
            e.preventDefault();
            var file = this.files[0];
            if (file) {
                img.src = URL.createObjectURL(file);
            }
        });
    </script>
</body>

</html>
