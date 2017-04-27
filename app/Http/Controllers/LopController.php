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

class LopController extends Controller
{
    public function xuatTrangThemLop(){
        $ThongBao = 0;
    	return view('admin.quanlylop.them-lop')->with('ThongBao',$ThongBao);
    }
    public function xuatDanhSach(){
        $lops = lop::where('status','1')->Paginate(5);
    	return view('admin.quanlylop.danh-sach-lop')->with('lops',$lops);
    }
    public function taoLopMoi(Request $r)
    {     
        $buoihoc = $r->BuoiHoc_Buoi." ".$r->BuoiHoc_Thu1." ".$r->BuoiHoc_Thu2." ".$r->BuoiHoc_Thu3;
    	$lop = new lop();
    	$lop->TenLop = $r['TenLop'];
    	$lop->HocPhi = $r['HocPhi'];
    	$lop->BuoiHoc = $buoihoc;
    	$lop->NgayBatDau = $r['NgayBatDau'];
    	$lop->save();
        $ThongBao = 1;
    	return view('admin.quanlylop.them-lop')->with('ThongBao',$ThongBao);
    }
    public function suaLop(Request $r){
        $lop= lop::where('MaLop',$r->MaLop)->first();
        return view('admin.quanlylop.sua-lop')->with('lop',$lop);
    }
    public function xoaLop(Request $r){
        lop::where('MaLop',$r->MaLop)->update(['status'=>'0']);
        $lops = lop::where('status','1')->Paginate(5);
        return view('admin.quanlylop.danh-sach-lop')->with('lops',$lops);
    }
    public function luuThongTin(Request $r){
        if(isset($r->TenLop)){ 
            lop::where('MaLop',$r->MaLop)->update(['TenLop' => $r->TenLop]);
        }
        if(isset($r->HocPhi)){ 
            lop::where('MaLop',$r->MaLop)->update(['HocPhi' => $r->HocPhi]);
        }
        if(isset($r->NgayBatDau)){ 
            lop::where('MaLop',$r->MaLop)->update(['NgayBatDau' => $r->NgayBatDau]);
        }
        $buoihoc = $r->BuoiHoc_Buoi." ".$r->BuoiHoc_Thu1." ".$r->BuoiHoc_Thu2." ".$r->BuoiHoc_Thu3;
        lop::where('MaLop',$r->MaLop)->update(['BuoiHoc' => $buoihoc]);
        $lops = lop::where('status','1')->Paginate(5);
        return view('admin.quanlylop.danh-sach-lop')->with('lops',$lops);
    }
}