<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Admin\MovieController;


Route::prefix('admin')->name('admin.')->group(function () {
    // Hiển thị danh sách các movie
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
    
    // Hiển thị form tạo mới movie
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    
    // Lưu dữ liệu movie mới vào database
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    
    // Hiển thị form chỉnh sửa movie
    Route::get('/movies/edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
    
    // Cập nhật dữ liệu movie
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    
    // Xóa movie
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});




