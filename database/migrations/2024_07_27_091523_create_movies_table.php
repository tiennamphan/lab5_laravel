<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Khóa chính, tự động tăng
            $table->string('title', 255); // Tiêu đề phim
            $table->string('poster', 255)->nullable(); // Hình ảnh áp phích, có thể null
            $table->string('intro', 255); // Giới thiệu phim
            $table->date('release_date'); // Ngày công chiếu
            $table->unsignedBigInteger('genre_id'); // Khóa ngoại tới bảng genes
            $table->foreign('genre_id')->references('id')->on('genes')->onDelete(); // Định nghĩa khóa ngoại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
