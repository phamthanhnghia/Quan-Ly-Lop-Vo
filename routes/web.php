<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   	return view('auth.login');
    //return view('admin.trangchu.trang-chu');
});
Route::get('/register',function(){
	return view('auth.register');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'quan-ly'], function () {

	Route::group(['prefix' => 'quan-ly-hoc-vien'], function () {

		Route::get('danh-sach-lop','HocVienController@danhSachLopHocVien')->name('danh-sach-lop-them-hoc-vien');

		Route::get('them-hoc-vien/{MALOP}','HocVienController@themHocVien')->name('them-hoc-vien');

		Route::post('tao-hoc-vien','HocVienController@taoHocVien')->name('tao-hoc-vien');

		Route::get('danh-sach-hoc-vien/{MALOP}','HocVienController@danhSachHocVien')->name('danh-sach-hoc-vien');
		
		Route::get('xem-hoc-vien/{MaHocVien}','HocVienController@xemHocVien')->name('xem-hoc-vien');

		Route::get('sua-hoc-vien/{MaHocVien}','HocVienController@suaHocVien')->name('sua-hoc-vien');
		
		Route::get('xoa-hoc-vien/{MaHocVien}','HocVienController@xoaHocVien')->name('xoa-hoc-vien');

		Route::post('luu-thong-tin','HocVienController@luuThongTin')->name('luu-thong-tin-hoc-vien');
	});
	
	Route::group(['prefix' => 'diem-danh'], function () {

		Route::get('/','DiemDanhController@chucNang')->name('chuc-nang-diem-danh');

		Route::get('chon-lop','DiemDanhController@chonLop')->name('chon-lop-diem-danh');

		Route::get('thuc-hien-diem-danh/{R}','DiemDanhController@thucHien')->name('thuc-hien-diem-danh');

		Route::post('thuc-hien-diem-danh/diem-danh','DiemDanhController@diemDanh')->name('diem-danh');

		Route::get('chon-lop-ngay-thong-ke','DiemDanhController@xuatDanhSach')->name('chon-lop-ngay-thong-ke');

		Route::get('thong-ke-lich-su/{R}','DiemDanhController@thongKeLichSu')->name('thong-ke-lich-su');
	});
	Route::group(['prefix' => 'dong-tien'], function () {

		Route::get('/','DongTienController@chucNang')->name('chuc-nang-dong-tien');

		Route::get('chon-lop-dong-tien','DongTienController@chonLop')->name('chon-lop-dong-tien');

		Route::get('thuc-hien-dong-tien/{R}','DongTienController@danhSachHocVien')->name('thuc-hien-dong-tien');
		//Route::get('thuc-hien-dong-tien/{R}','DongTienController@thucHien')->name('thuc-hien-dong-tien');
		Route::post('dong-tien','DongTienController@luuThongTinDongTien')->name('dong-tien');

		Route::get('thong-tin-hoc-vien-dong-tien','DongTienController@thongTinHocVien')->name('thong-tin-hoc-vien-dong-tien');

		Route::get('chon-lop-thong-ke-dong-tien','DongTienController@xuatDanhSach')->name('chon-lop-thong-ke-dong-tien');
		Route::get('thong-ke-lich-su-dong-tien/{R}','DongTienController@thongKeLichSu')->name('thong-ke-lich-su-dong-tien');
		//Route::post('thuc-hien-dong-tien/dong-tien','DongTienController@dongTien')->name('dong-tien');
	});

	Route::group(['prefix' => 'lop'], function () {
		
		Route::get('them-lop','LopController@xuatTrangThemLop')->name('them-lop');

		Route::get('danh-sach-lop','LopController@xuatDanhSach')->name('danh-sach-lop');

		Route::post('danh-sach-lop','LopController@taoLopMoi')->name('tao-lop-moi');

		Route::get('sua-lop/{MaLop}','LopController@suaLop')->name('sua-lop');

		Route::get('xoa-lop/{MaLop}','LopController@xoaLop')->name('xoa-lop');

		Route::post('luu-thong-tin','LopController@luuThongTin')->name('luu-thong-tin-lop');
	});
});

// Auth::routes();

// Route::get('/home', 'HomeController@index');
