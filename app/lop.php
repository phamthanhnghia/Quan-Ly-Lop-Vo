<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    protected $table = "lop";

    protected $fillable = [
        'MaLop', 'TenLop', 'NgayBatDau','HocPhi','BuoiHoc','status'
    ];

    public $timestamps = false;
}
