<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdiemdanh extends Model
{
    protected $table = "chitietdiemdanh";

    protected $fillable = [
    'MaChiTietDiemDanh','MaBangDiemDanh','MaTrangThai','MaHocVien'
    ];
    public $timestamps = false;
}
