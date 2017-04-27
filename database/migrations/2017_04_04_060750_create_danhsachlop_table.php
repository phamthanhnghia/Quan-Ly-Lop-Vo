<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhsachlopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhsachlop', function (Blueprint $table) {
            $table->increments('MaDanhSachLop');
            $table->integer('MaLop')->unsigned();
            $table->integer('MaHocVien')->unsigned();
            $table->foreign('MaLop')->references('MaLop')->on('lop');
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
        Schema::dropIfExists('danhsachlop');
    }
}
