<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocphiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocphi', function (Blueprint $table) {
            $table->increments('MaHocPhi');
            $table->integer('MaLop')->unsigned();
            $table->integer('MaHocVien')->unsigned();
            $table->integer('Thang')->nullable();
            $table->integer('Nam')->nullable();
            $table->date('NgayDongTien')->nullable();
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
        Schema::dropIfExists('hocphi');
    }
}
