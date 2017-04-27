<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichsulendaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsulendai', function (Blueprint $table) {
            $table->increments('MaLichSuLenDai');
            $table->integer('MaHocVien')->unsigned();
            $table->integer('MaLop')->unsigned();
            $table->string('CapDai');
            $table->date('NgayLenDai');
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
        Schema::dropIfExists('lichsulendai');
    }
}
