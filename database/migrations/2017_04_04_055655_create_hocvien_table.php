<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocvien', function (Blueprint $table) {
            $table->increments('MaHocVien');
            $table->string('HoTen');
            $table->string('Phai');
            $table->date('NgaySinh')->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('DienThoai')->nullable();
            $table->string('CapDai');
            $table->date('NgayCapDai');
            $table->string('Hinh')->nullable();
            $table->string('TenCha')->nullable();
            $table->string('NgheCha')->nullable();
            $table->string('SoDienThoaiCha')->nullable();
            $table->string('TenMe')->nullable();
            $table->string('NgheMe')->nullable();
            $table->string('SoDienThoaiMe')->nullable();
            $table->integer('status')->default('1'); // 1- còn học  0- nghỉ học
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
        Schema::dropIfExists('hocvien');
    }
}
