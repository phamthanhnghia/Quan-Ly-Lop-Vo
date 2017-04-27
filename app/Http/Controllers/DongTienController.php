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

class DongTienController extends Controller
{
    public function chucNang(){
    	return view('admin.dongtien.chuc-nang');
    }
    public function chonLop(){
    	$lops = lop::where('status','1')->Paginate(5);
    	return view('admin.dongtien.chon-lop-dong-tien')->with('lops',$lops);
    }
    public function danhSachHocVien(Request $r){
        $hocviens = DB::table('danhsachlop')
                        ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                        ->where('danhsachlop.MaLop',$r->R)
                        ->where('hocvien.status','1')
                        ->select('hocvien.*')->paginate(10);
        return view('admin.dongtien.danh-sach-hoc-vien')->with('hocviens',$hocviens)->with('MaLop',$r->R);
    }
    public function thongTinHocVien(Request $r){
        $MaLop = danhsachlop::where('MaHocVien',$r->MaHocVien)->value('MaLop');
        $lop = lop::where('MaLop',$MaLop)->first();
        $hocvien = hocvien::where('MaHocVien',$r->MaHocVien)->first();
        $array_Thang = hocphi::where('MaHocVien',$r->MaHocVien)->where('MaLop',$MaLop)->where('Nam',date('Y'))->select('Thang')->get();
        $ChuoiThang = array(0,0,0,0,0,0,0,0,0,0,0,0,0); //13
        foreach ($array_Thang as $array) {
            $ChuoiThang[$array['Thang']]=1;
        }
        return view('admin.dongtien.dong-tien-hoc-vien')->with('hocvien',$hocvien)->with('lop',$lop)->with('ChuoiThang',$ChuoiThang);
    }
    public function luuThongTinDongTien(Request $r){
        $MaHocVien = $r->MaHocVien;
        $MaLop = $r->MaLop;
        $Nam = $r->Nam;
        $array = array($r->T1,$r->T2,$r->T3,$r->T4,$r->T5,$r->T6,$r->T7,$r->T8,$r->T9,$r->T10,$r->T11,$r->T12);
        for ($i=0; $i < 12; $i++) { 
            if($array[$i] == "1"){
                $check = hocphi::where('MaHocVien',$MaHocVien)->where('MaLop',$MaLop)->where('Thang',$i+1)->where('Nam',$Nam)->first();
                    if($check == ""){
                        $hocphi = new hocphi();
                        $hocphi->MaHocVien = $MaHocVien;
                        $hocphi->MaLop =$MaLop;
                        $hocphi->Nam = $Nam;
                        $hocphi->Thang =$i+1;
                        $hocphi->NgayDongTien = date('Y-m-d');
                        $hocphi->save();
                    }
            }else{
                hocphi::where('MaHocVien',$MaHocVien)->where('MaLop',$MaLop)->where('Thang',$i+1)->where('Nam',$Nam)->delete();
            }
        }


        //$Thang = $r->Thang;
         //$check = hocphi::where('MaHocVien',$MaHocVien)->where('MaLop',$MaLop)->where('Thang',$Thang)->where('Nam',$Nam)->first();
        // if($check == ""){
        //     $hocphi = new hocphi();
        //     $hocphi->MaHocVien = $MaHocVien;
        //     $hocphi->MaLop =$MaLop;
        //     $hocphi->Nam = $Nam;
        //     $hocphi->Thang =$Thang;
        //     $hocphi->NgayDongTien = date('Y-m-d');
        //     $hocphi->save();
        // }
        // $lop = lop::where('MaLop',$MaLop)->first();
        // $hocvien = hocvien::where('MaHocVien',$r->MaHocVien)->first();
        // return view('admin.dongtien.dong-tien-hoc-vien')->with('hocvien',$hocvien)->with('lop',$lop);


    }
    public function xuatDanhSach(){
        $lops = lop::where('status','1')->simplePaginate(5);
        return view('admin.dongtien.chon-lop-thong-ke-lich-su-dong-tien')->with('lops',$lops);
    }
    public function thongKeLichSu(Request $r){
        $array = explode("@@",$r->R);
        $MaLop =$array[0];
        $Thang =$array[1];
        $Nam =$array[2];
        $TenLop = $array[3];
        $hocviens = DB::table('hocphi')
                        ->join('hocvien','hocvien.MaHocVien','=','hocphi.MaHocVien')
                        ->where('hocphi.MaLop',$MaLop)
                        ->where('hocphi.Thang',$Thang)
                        ->where('hocphi.Nam',$Nam)
                        ->select('hocvien.*')->paginate(10);
        return view('admin.dongtien.danh-sach-lich-su-dong-tien')->with('hocviens',$hocviens)->with('Thang',$Thang)->with('Nam',$Nam)->with('TenLop',$TenLop);
    }

    // failed
    public function thucHien(Request $r){
    	$array = explode("@@",$r->R);
        $MaLop =$array[0];
        $NgayDongTien = $array[1];
        $Thang = $array[2];
        $Nam =$array[3];
        //echo $Nam;
        $check_mahocphi = hocphi::where('MaLop',$MaLop)->where('Thang',$Thang)->where('Nam',$Nam)->value('MaHocPhi');
        $lop= lop::where('MaLop',$MaLop)->first();
        if($check_mahocphi == ""){
        	$hocphi = new hocphi();
	        $hocphi->MaLop = $MaLop;
	        $hocphi->Thang =$Thang;
	        $hocphi->Nam =$Nam;
	        $hocphi->save();
	        $MaHocPhi=$hocphi->id;
	        $hocviens = DB::table('danhsachlop')
                                ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                                ->where('danhsachlop.Malop',$MaLop)
                                ->where('hocvien.status','1')
                                ->select('hocvien.*')->paginate(20);
        return view('admin.dongtien.dong-tien-hoc-vien')->with('hocviens',$hocviens)->with('MaHocPhi',$MaHocPhi)->with('lop',$lop);
        }else{
        	$hocviens = DB::table('danhsachlop')
                                ->join('hocvien','danhsachlop.MaHocVien','=','hocvien.MaHocVien')
                                ->where('danhsachlop.Malop',$MaLop)
                                ->where('hocvien.status','1')
                                ->whereNotIn('hocvien.MaHocVien',$danhsachdongtien = DB::table('chitiethocphi')
                                    ->where('chitiethocphi.MaHocPhi',$check_mahocphi)
                                    ->select('chitiethocphi.MaHocVien'))
                                ->select('hocvien.*')->paginate(20);
            return view('admin.dongtien.dong-tien-hoc-vien')->with('hocviens',$hocviens)->with('MaHocPhi',$check_mahocphi)->with('lop',$lop)->with('Thang',$Thang)->with('Nam',$Nam);
        }
    }
    public function dongTien(Request $r){
        $MaLop = $r->MaLop;
        $MaHocVien = $r->MaHocVien;
        $MaHocPhi =$r->MaHocPhi;
        $GhiChu= $r->GhiChu;
        $Thang=$r->Thang;
        $Nam=$r->Nam;
        $NgayDongTien = date('Y-m-d');
        $MaChiTietHocPhi = DB::table('chitiethocphi')
                                ->where('MaHocVien',$MaHocVien)
                                ->where('MaHocPhi',$MaHocPhi)
                                ->value('MaChiTietHocPhi');
                                //sleep(1);
        if($MaChiTietHocPhi == null){

            DB::table('chitiethocphi')->insert([
                'MaHocPhi' => $MaHocPhi,
                'MaHocVien' => $MaHocVien,
                'NgayDongTien' => $NgayDongTien,
                'GhiChu' => $GhiChu
            ]);
            //return newchitiethocphi($MaHocPhi,$MaHocVien,$NgayDongTien,$GhiChu);

            // $chitiethocphi = new chitiethocphi();
            // $chitiethocphi->MaHocPhi = $MaHocPhi;
            // $chitiethocphi->MaHocVien = $MaHocVien;
            // $chitiethocphi->NgayDongTien = $NgayDongTien;
            // $chitiethocphi->GhiChu = $GhiChu;
            // $chitiethocphi->save();
            //return $Thang;
        }else{
            chitiethocphi::where('MaChiTietHocPhi',$MaChiTietHocPhi)->delete();
        }
        //return $Nam;
    }
    
}
