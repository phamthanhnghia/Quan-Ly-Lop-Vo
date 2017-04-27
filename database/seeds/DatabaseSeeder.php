<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\giaovien;
use App\lop;
use App\hocvien;
use App\danhsachlop;
use App\diemdanh;
use App\hocphi;
use App\bangdiemdanh;
use App\chitietdiemdanh;
use App\lichsulendai;
use App\phancong;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	for ($i=0; $i < 17 ; $i++) { 
    		DB::table('lop')->insert([
            'TenLop' => str_random(10),
            'NgayBatDau' => date("Y-m-d H:i:s",rand(1262055681,1262055681)),
            'HocPhi' => rand (100000,400000),
            'BuoiHoc' =>str_random(10),
        ]);
	   }

        for ($i=0; $i < 35 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 1;
            $danhsachlop->save();
        }
        for ($i=0; $i < 23 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 2;
            $danhsachlop->save();
        }
        for ($i=0; $i < 29 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 3;
            $danhsachlop->save();
        }
        for ($i=0; $i < 29 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 4;
            $danhsachlop->save();
        }
        for ($i=0; $i < 29 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 5;
            $danhsachlop->save();
        }
        for ($i=0; $i < 29 ; $i++) { 
            $hocvien = new hocvien();
            $hocvien->HoTen=str_random(20);
            $hocvien->Phai="Nam";
            $hocvien->NgaySinh=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->DiaChi=str_random(10);
            $hocvien->DienThoai=rand (100000000,999999999);
            $hocvien->CapDai="Trắng";
            $hocvien->NgayCapDai=date("Y-m-d H:i:s",rand(1262055681,1262055681));
            $hocvien->TenCha=str_random(12);
            $hocvien->NgheCha=str_random(10);
            $hocvien->SoDienThoaiCha=rand (100000000,999999999);
            $hocvien->TenMe=str_random(12);
            $hocvien->NgheMe=str_random(10);
            $hocvien->SoDienThoaiMe=rand (100000000,999999999);
            $hocvien->save();
            $danhsachlop = new danhsachlop();
            $danhsachlop->MaHocVien = $hocvien->id;
            $danhsachlop->MaLop = 6;
            $danhsachlop->save();
        }
    }
}
