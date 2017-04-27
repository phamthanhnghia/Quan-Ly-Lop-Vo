<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lop;
use App\hocvien;
use App\danhsachlop;
use App\diemdanh;
use App\hocphi;
use App\bangdiemdanh;
use App\chitietdiemdanh;
use App\lichsulendai;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class HocVienController extends Controller
{
    public function danhSachLopHocVien(){
    	$lops = lop::where('status','1')->Paginate(5);
    	return view('admin.quanlyhocvien.chon-lop')->with('lops',$lops);
    }
    public function themHocVien(Request $r){
    	$MaLop =  $r->MALOP;
    	$TenLop = lop::where('MaLop',$MaLop)->value('TenLop');
        $ThongBao = 0;
    	return view('admin.quanlyhocvien.them-hoc-vien')->with('MaLop',$MaLop)->with('TenLop',$TenLop)->with('ThongBao',$ThongBao);
    }
    public function taoHocVien(Request $r){
    	$hocvien = new hocvien();
		$hocvien->HoTen=$r->HoTen;
		$hocvien->Phai=$r->Phai;
		$hocvien->NgaySinh=$r->NgaySinh;
		$hocvien->DiaChi=$r->DiaChi;
		$hocvien->DienThoai=$r->DienThoai;
		$hocvien->CapDai=$r->CapDai;
		$hocvien->NgayCapDai=$r->NgayCapDai;
		$hocvien->TenCha=$r->TenCha;
		$hocvien->NgheCha=$r->NgheCha;
		$hocvien->SoDienThoaiCha=$r->SoDienThoaiCha;
		$hocvien->TenMe=$r->TenMe;
		$hocvien->NgheMe=$r->NgheMe;
		$hocvien->SoDienThoaiMe=$r->SoDienThoaiMe;
		$hocvien->save();
    	$danhsachlop = new danhsachlop();
    	$danhsachlop->MaHocVien = $hocvien->id;
    	$danhsachlop->MaLop = $r->MaLop;
    	$danhsachlop->save();
    	$MaLop =  $r->MaLop;
    	$TenLop = lop::where('MaLop',$MaLop)->value('TenLop');
        $ThongBao = 1;
    	return view('admin.quanlyhocvien.them-hoc-vien')->with('MaLop',$MaLop)->with('TenLop',$TenLop)->with('ThongBao',$ThongBao);
    }
    public function danhSachHocVien(Request $r){
        //$TenLop = lop::where('MaLop',$r->MALOP)->first();
        $hocviens = DB::table('danhsachlop')
                        ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                        ->where('danhsachlop.Malop',$r->MALOP)
                        ->where('hocvien.status','1')
                        ->select('hocvien.*')->paginate(10);
        return view('admin.quanlyhocvien.danh-sach-hoc-vien')->with('hocviens',$hocviens);
    }
    public function xemHocVien(Request $r){
        $hocvien = hocvien::where('MaHocVien',$r->MaHocVien)->first();
        $lop = danhsachlop::where('MaHocVien',$r->MaHocVien)->first();
        $ThongBao = 0;
        return view('admin.quanlyhocvien.thong-tin-hoc-vien')->with('hocvien',$hocvien)->with('ThongBao',$ThongBao)->with('lop',$lop);
    }
    public function suaHocVien(Request $r){
        $hocvien = hocvien::where('MaHocVien',$r->MaHocVien)->first();
        $lop = danhsachlop::where('MaHocVien',$r->MaHocVien)->first();
        return view('admin.quanlyhocvien.sua-hoc-vien')->with('hocvien',$hocvien)->with('lop',$lop);
    }
    public function luuThongTin(Request $r){
        if(isset($r->HoTen)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['HoTen' => $r->HoTen]);
        }
        if(isset($r->Phai)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['Phai' => $r->Phai]);
        }
        if(isset($r->NgaySinh)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['NgaySinh' => $r->NgaySinh]);
        }
        if(isset($r->DiaChi)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['DiaChi' => $r->DiaChi]);
        }
        if(isset($r->CapDai)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['CapDai' => $r->CapDai]);
        }
        if(isset($r->NgayCapDai)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['NgayCapDai' => $r->NgayCapDai]);
        }
        if(isset($r->TenMe)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['TenMe' => $r->TenMe]);
        }
        if(isset($r->NgheMe)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['NgheMe' => $r->NgheMe]);
        }
        if(isset($r->SoDienThoaiMe)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['SoDienThoaiMe' => $r->SoDienThoaiMe]);
        }
        if(isset($r->TenCha)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['TenCha' => $r->TenCha]);
        }
        if(isset($r->NgheCha)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['NgheCha' => $r->NgheCha]);
        }
        if(isset($r->SoDienThoaiCha)){ 
            hocvien::where('MaHocVien',$r->MaHocVien)->update(['SoDienThoaiCha' => $r->SoDienThoaiCha]);
        }
        $hocvien = hocvien::where('MaHocVien',$r->MaHocVien)->first();
        $ThongBao =1;
        $lop = danhsachlop::where('MaHocVien',$r->MaHocVien)->first();
        return view('admin.quanlyhocvien.thong-tin-hoc-vien')->with('hocvien',$hocvien)->with('ThongBao',$ThongBao)->with('lop',$lop);
    }
    public function xoaHocVien(Request $r){
        hocvien::where('MaHocVien',$r->MaHocVien)->update(['status' => '0']);
        $MaLop = danhsachlop::where('MaHocVien',$r->MaHocVien)->value('MaLop');
        $hocviens = DB::table('danhsachlop')
                        ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                        ->where('danhsachlop.Malop',$MaLop)
                        ->where('hocvien.status','1')
                        ->select('hocvien.*')->paginate(10);
        return view('admin.quanlyhocvien.danh-sach-hoc-vien')->with('hocviens',$hocviens);
    }

}
