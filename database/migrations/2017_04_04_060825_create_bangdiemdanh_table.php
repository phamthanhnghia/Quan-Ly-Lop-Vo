<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangdiemdanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangdiemdanh', function (Blueprint $table) {
            $table->increments('MaBangDiemDanh');
            $table->date('NgayDiemDanh');
            $table->integer('MaLop')->unsigned();
            $table->foreign('Malop')->references('MaLop')->on('lop');
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
        Schema::dropIfExists('bangdiemdanh');
    }
}
