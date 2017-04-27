@extends('admin.layouts.layouts')
@section('title-main')
    <b>Thông Tin Học Viên {{ $hocvien->HoTen }}</b>
@stop
@section('header-main')
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-lop') }}">Danh sách lớp</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-hoc-vien',['MALOP'=>$lop->MaLop]) }}">Danh sách học viên</a></li>
  <li class="breadcrumb-item active">Thông tin học viên</li>
</ol>

<div class="row">
    <div class="col-lg-6">
    <div class="form-group">
       <label>Họ tên: <font color="#5054BA">{{ $hocvien->HoTen }}</font> </label>
    </div>
    <div class="form-group">
        <label>Giới tính: <font color="#5054BA">{{ $hocvien->Phai }}</font></label>
    </div>
    <div class="form-group">
       <label>Ngày sinh: <font color="#5054BA">{{ $hocvien->NgaySinh }}</font></label>
    </div>
    <div class="form-group">
       <label>Địa chỉ: <font color="#5054BA">{{ $hocvien->DiaChi }}</font></label>
    </div>
    <div class="form-group">
       <label>Điện thoại: <font color="#5054BA">{{ $hocvien->DienThoai }}</font></label>
    </div>
    <div class="form-group">
        <label>Cấp đai: <font color="#5054BA">{{ $hocvien->CapDai }}</font></label>
    </div>
    <div class="form-group">
       <label>Ngày lên đai: <font color="#5054BA">{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime($hocvien->NgayCapDai))) }}</font></label>
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
       <label>Tên mẹ: <font color="#5054BA">{{ $hocvien->TenMe }}</font></label>
    </div>
    <div class="form-group">
       <label>Nghề nghiệp mẹ: <font color="#5054BA">{{ $hocvien->NgheMe }}</font></label>
    </div>
    <div class="form-group">
       <label>Điện thoại mẹ: <font color="#5054BA">{{ $hocvien->SoDiemThoaiMe }}</font></label>
    </div>
    <div class="form-group">
       <label>Tên cha: <font color="#5054BA">{{ $hocvien->TenCha }}</font></label>
    </div>
    <div class="form-group">
       <label>Nghề nghiệp cha: <font color="#5054BA">{{ $hocvien->NgheCha }}</font></label>
    </div>
    <div class="form-group">
       <label>Điện thoại cha: <font color="#5054BA">{{ $hocvien->SoDienThoaiCha }}</font></label>
    </div>
</div>
  
<div class="modal fade" id="{{ $hocvien->MaHocVien }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa học viên này ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
        <a href="{{ route('xoa-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" id="confirmation" class="btn btn-outline btn-danger">Xóa</a>
      </div>
    </div>
  </div>
</div>

</div>
<div class="form-group">
    <a href="{{ route('sua-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" class="btn btn-outline btn-warning">Thay đổi thông tin</a>
    <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#{{ $hocvien->MaHocVien }}">Xóa học viên</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông Báo</h4>
      </div>
      <div class="modal-body">
        Đã lưu thông tin học viên thành công !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
    $(window).on('load',function(){
        @php
            if($ThongBao == 1){
                echo "$('#myModal').modal('show');";
            }
        @endphp
    });
    </script>
@stop