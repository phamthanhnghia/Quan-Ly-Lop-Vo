<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdiemdanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdiemdanh', function (Blueprint $table) {
            $table->increments('MaChiTietDiemDanh');
            $table->integer('MaBangDiemDanh')->unsigned();
            $table->integer('MaHocVien')->unsigned();
            $table->integer('TrangThai');
            $table->foreign('MaBangDiemDanh')->references('MaBangDiemDanh')->on('bangdiemdanh');
            $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien');
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
        Schema::dropIfExists('chitietdiemdanh');
    }
}
