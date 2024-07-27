<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container m-4">
        <h1>Danh sách phim</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>
                            @if ($movie->poster)
                                <img src="{{ asset('/storage/' . $movie->poster) }}" width="50" alt="{{ $movie->title }}">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d-m-Y') : 'N/A' }}</td>
                        <td>{{ $movie->gene->name }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.movies.destroy', $movie) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $movies->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-7F5UFA3XbK4UoK1wbO68fhEr6i5s5ODo/0IAT7Ra5LiZP6oBAPXc8e1FzS+Zl5ZT" crossorigin="anonymous"></script>
</body>

</html>
