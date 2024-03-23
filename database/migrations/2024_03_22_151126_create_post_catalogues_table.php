<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_catalogues', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);// lưu mã danh mục cha
            $table->integer('left')->default(0);// giá trị bên trái danh mục
            $table->integer('right')->default(0);// giá trị bên trái danh mục
            $table->integer('level')->default(0);// cấp bậc của danh mục đó
            $table->string('image')->nullable();// ảnh đại diện
            $table->string('icon')->nullable();// ảnh nhỏ
            $table->text('album')->nullable();// danh sách ảnh
            $table->tinyInteger('publish')->default(1);// trạng thái
            $table->integer('order')->default(0);// vị trí sắp xếp của danh mục
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_catalogues');
    }
};
