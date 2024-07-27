<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gene;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    // Hiển thị form create
    public function create()
    {
        $genres = Gene::all();
        return view('admin.movies.create', compact('genres'));
    }

    // Lưu dữ liệu được thêm vào database
    public function store(Request $request)
    {
        $data = $request->except('poster');
        $data['poster'] = "";

        // Kiểm tra file
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }

        // Lưu data vào database
        Movie::query()->create($data);
        return redirect()->route('movies.index')->with('message', 'Thêm dữ liệu thành công');
    }

    // Xóa bài viết
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('message', 'Xóa dữ liệu thành công');
    }

    // Hiển thị form edit
    public function edit(Movie $movie)
    {
        $genres = Gene::all();
        return view('admin.movies.edit', compact('genres', 'movie'));
    }

    // Cập nhật dữ liệu
    public function update(Request $request, Movie $movie)
    {
        $data = $request->except('poster');
        $old_poster = $movie->poster;
        $data['poster'] = $old_poster;

        // Người dùng không upload ảnh mới
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }

        // Update data
        $movie->update($data);

        // Xóa ảnh cũ nếu có
        if ($request->hasFile('poster')) {
            if (file_exists('storage/' . $old_poster)) {
                unlink('storage/' . $old_poster);
            }
        }

        return redirect()->back()->with('message', 'Cập nhật thành công');
    }
}
