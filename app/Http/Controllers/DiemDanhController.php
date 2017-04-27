<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lop;
use App\hocvien;
use App\danhsachlop;
use App\diemdanh;
use App\hocphi;
use App\chitiethocphi;
use App\bangdiemdanh;
use App\chitietdiemdanh;
use App\lichsulendai;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DiemDanhController extends Controller
{
    public function chucNang(){
    	return view('admin.diemdanh.chuc-nang');
    }
    public function chonLop(){
    	$lops = lop::where('status','1')->simplePaginate(5);
    	return view('admin.diemdanh.chon-lop')->with('lops',$lops);
    }
    //
    public function thucHien(Request $r){
    	$array = explode("@@",$r->R);
    	$MaLop = $array[0];
    	$NgayDiemDanh = $array[1];
        $check_MaBangDiemDanh = bangdiemdanh::where('NgayDiemDanh',$NgayDiemDanh)->where('MaLop',$MaLop)->value('MaBangDiemDanh');
        $lop= lop::where('MaLop',$MaLop)->first();

        $danhsachhocvien = DB::table('danhsachlop')
                                ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                                ->where('danhsachlop.Malop',$MaLop)
                                ->select('hocvien.*')->get();

        if($check_MaBangDiemDanh == ""){

            $bangdiemdanh = new bangdiemdanh();
            $bangdiemdanh->MaLop = $MaLop;
            $bangdiemdanh->NgayDiemDanh = $NgayDiemDanh;
            $bangdiemdanh->save();
            $MaBangDiemDanh = $bangdiemdanh->id;

            foreach ($danhsachhocvien as $danhsachhocvien) {
                $MaChiTietDiemDanh = DB::table('chitietdiemdanh')
                    ->where('MaBangDiemDanh', $check_MaBangDiemDanh)
                    ->where('MaHocVien',$danhsachhocvien->MaHocVien)->value('MaChiTietDiemDanh');
                    if($MaChiTietDiemDanh == null){
                        $chitietdiemdanh = new chitietdiemdanh();
                        $chitietdiemdanh->MaHocVien = $danhsachhocvien->MaHocVien;
                        $chitietdiemdanh->MaBangDiemDanh = $MaBangDiemDanh;
                        $chitietdiemdanh->TrangThai = "0";
                        $chitietdiemdanh->save();
                    }
            }

            $hocviens = DB::table('bangdiemdanh')
                        ->join('chitietdiemdanh','chitietdiemdanh.MaBangDiemDanh','=','bangdiemdanh.MaBangDiemDanh')
                        ->join('hocvien','chitietdiemdanh.MaHocVien','=','hocvien.MaHocVien')
                        ->where('bangdiemdanh.Malop',$MaLop)
                        ->where('hocvien.status','1')
                        ->select('hocvien.*','chitietdiemdanh.TrangThai')->paginate(20);
            return view('admin.diemdanh.diem-danh-hoc-vien')->with('hocviens',$hocviens)->with('MaBangDiemDanh',$MaBangDiemDanh)->with('lop',$lop);
        }else{

            foreach ($danhsachhocvien as $danhsachhocvien) {
                $MaChiTietDiemDanh = DB::table('chitietdiemdanh')
                        ->where('MaBangDiemDanh', $check_MaBangDiemDanh)
                        ->where('MaHocVien',$danhsachhocvien->MaHocVien)->value('MaChiTietDiemDanh');
                        if($MaChiTietDiemDanh == null){
                            $chitietdiemdanh = new chitietdiemdanh();
                            $chitietdiemdanh->MaHocVien = $danhsachhocvien->MaHocVien;
                            $chitietdiemdanh->MaBangDiemDanh = $check_MaBangDiemDanh;
                            $chitietdiemdanh->TrangThai = "0";
                            $chitietdiemdanh->save();
                        }
            }
            $hocviens = DB::table('bangdiemdanh')
                                ->join('chitietdiemdanh','chitietdiemdanh.MaBangDiemDanh','=','bangdiemdanh.MaBangDiemDanh')
                                ->join('hocvien','chitietdiemdanh.MaHocVien','=','hocvien.MaHocVien')
                                ->where('bangdiemdanh.Malop',$MaLop)
                                ->where('bangdiemdanh.MaBangDiemDanh',$check_MaBangDiemDanh)
                                ->where('hocvien.status','1')
                                ->select('hocvien.*','chitietdiemdanh.TrangThai')->paginate(20);
            //echo $hocviens;
            return view('admin.diemdanh.diem-danh-hoc-vien')->with('hocviens',$hocviens)->with('MaBangDiemDanh',$check_MaBangDiemDanh)->with('lop',$lop);
        }
    }



    public function diemDanh(Request $r){
        $MaHocVien = $r->MaHocVien;
        $MaBangDiemDanh = $r->MaBangDiemDanh;
        $MaChiTietDiemDanh = DB::table('chitietdiemdanh')
                        ->where('MaBangDiemDanh', $r->MaBangDiemDanh)
                        ->where('MaHocVien',$r->MaHocVien)->value('MaChiTietDiemDanh');

        if($MaChiTietDiemDanh == null){
            $chitietdiemdanh = new chitietdiemdanh();
            $chitietdiemdanh->MaHocVien = $MaHocVien;
            $chitietdiemdanh->MaBangDiemDanh = $MaBangDiemDanh;
            $chitietdiemdanh->TrangThai = "1";
            $chitietdiemdanh->save();
        }else{
            $TrangThai = chitietdiemdanh::where('MaChiTietDiemDanh',$MaChiTietDiemDanh)->value('TrangThai');
            if($TrangThai == '1'){
                chitietdiemdanh::where('MaChiTietDiemDanh',$MaChiTietDiemDanh)->update(['TrangThai' => 0]);
            }else{
                chitietdiemdanh::where('MaChiTietDiemDanh',$MaChiTietDiemDanh)->update(['TrangThai' => 1]);
            }
        }
    }

    //xuat danh sach lop chon ngay thong ke
    public function xuatDanhSach(){
        $lops = lop::where('status','1')->simplePaginate(5);
        return view('admin.diemdanh.ngay-thong-ke')->with('lops',$lops);
    }
    //thong ke
    public function thongKeLichSu(Request $r){
        $array = explode("@@",$r->R);
        $MaLop =$array[0];
        $NgayBatDau = $array[1];
        $bangdiemdanh =DB::table('bangdiemdanh')
                            ->where('MaLop',$MaLop)
                            ->where('NgayDiemDanh','>=',$NgayBatDau)
                            ->select('bangdiemdanh.MaBangDiemDanh')->get();
        $str = array();
        $i=0;
        foreach ($bangdiemdanh as $key) {
            $str[$i] =  $key->MaBangDiemDanh;
            $i++;
        }
        $thongkediemdanh = DB::table('chitietdiemdanh')
                        ->join('hocvien','hocvien.MaHocVien','=','chitietdiemdanh.MaHocVien')
                        ->whereIn('chitietdiemdanh.MaBangDiemDanh',$str)
                        ->where('hocvien.status','1')
                        ->where('chitietdiemdanh.TrangThai','1')
                        ->select('chitietdiemdanh.MaHocVien','hocvien.HoTen','hocvien.NgaySinh','hocvien.CapDai','hocvien.DienThoai',DB::raw('count(*) as count'))
                        ->groupBy('chitietdiemdanh.MaHocVien','hocvien.HoTen','hocvien.NgaySinh','hocvien.CapDai','hocvien.DienThoai')
                        ->simplePaginate(10);
        $lop = lop::where('MaLop',$MaLop)->first();
        return view('admin.diemdanh.thong-ke-lich-su')->with('hocviens',$thongkediemdanh)->with('lop',$lop)->with('NgayBatDau',$NgayBatDau);
    }
}
