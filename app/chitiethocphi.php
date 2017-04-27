<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethocphi extends Model
{
    protected $table = "chitiethocphi";

    protected $fillable = [
    'MaHocPhi','MaHocVien','NgayDongTien','GhiChu'
    ];
    public $timestamps = false;
}
