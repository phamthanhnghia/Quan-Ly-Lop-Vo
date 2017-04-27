@extends('admin.layouts.layouts')
@section('title-main')
    <b>Sửa Thông Tin Học Viên {{ $hocvien->HoTen }}</b>
@stop
@section('header-main')
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-lop') }}">Danh sách lớp</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-hoc-vien',['MALOP'=>$lop->MaLop]) }}">Danh sách học viên</a></li>
  <li class="breadcrumb-item active">Thay đổi thông tin</li>
</ol>
<form method="POST" action="{{ route('luu-thong-tin-hoc-vien') }}" class="from-content" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="MaHocVien" value="{{ $hocvien->MaHocVien }}">
<div class="row">
    <div class="col-lg-6">
    <div class="form-group">
       <label>Họ tên</label>
            <input name="HoTen" id="HoTen" value="{{ $hocvien->HoTen }}" class="form-control" >
    </div>
    <div class="form-group">
        <label>Giới tính</label>
        <select name="Phai" class="form-control" >
            <option>Nam</option>
            <option>Nữ</option>
        </select>
    </div>
    <div class="form-group">
       <label>Ngày sinh</label>
            <input name="NgaySinh" value="{{ $hocvien->NgaySinh }}" type="date" class="form-control" >
    </div>
    <div class="form-group">
       <label>Địa chỉ</label>
            <input name="DiaChi" id="DiaChi" value="{{ $hocvien->DiaChi }}" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại</label>
            <input name="DienThoai" value="{{ $hocvien->DienThoai }}" type="number" class="form-control" >
    </div>
    <div class="form-group">
        <label>Cấp đai</label>
        <select name="CapDai" class="form-control" >
          <optgroup label="Trắng">
            <option @php
                if( $hocvien->CAPDAI ==="Đai trắng"){
                  echo "selected";
                }
            @endphp value="Đai trắng">Đai trắng</option>
          </optgroup>
          <optgroup label="Đai xanh">
            <option @php
                if( $hocvien->CAPDAI ==="Đai xanh 1 gạch"){
                  echo "selected";
                }
            @endphp value="Đai xanh 1 gạch">Đai xanh 1 gạch</option>
            <option @php
                if( $hocvien->CAPDAI ==="Đai xanh 2 gạch"){
                  echo "selected";
                }
            @endphp value="Đai xanh 2 gạch">Đai xanh 2 gạch</option>
            <option @php
                if( $hocvien->CAPDAI ==="Đai xanh 3 gạch"){
                  echo "selected";
                }
            @endphp value="Đai xanh 3 gạch">Đai xanh 3 gạch</option>
          </optgroup>
          <optgroup label="Đai nâu">
            <option @php
                if( $hocvien->CAPDAI ==="Đai nâu 1 gạch"){
                  echo "selected";
                }
            @endphp value="Đai nâu 1 gạch">Đai nâu 1 gạch</option>
            <option @php
                if( $hocvien->CAPDAI ==="Đai nâu 2 gạch"){
                  echo "selected";
                }
            @endphp value="Đai nâu 2 gạch">Đai nâu 2 gạch</option>
            <option @php
                if( $hocvien->CAPDAI ==="Đai nâu 3 gạch"){
                  echo "selected";
                }
            @endphp value="Đai nâu 3 gạch">Đai nâu 3 gạch</option>
          </optgroup>
          <optgroup label="Đai đen">
            <option @php
                if( $hocvien->CAPDAI ==="Đai đen 1 đẳng"){
                  echo "selected";
                }
            @endphp value="Đai đen 1 đẳng">Đai đen 1 đẳng</option>
            <option @php
                if( $hocvien->CAPDAI ==="Đai đen 2 đẳng"){
                  echo "selected";
                }
            @endphp value="Đai đen 2 đẳng">Đai đen 2 đẳng</option>
          </optgroup>
        </select>
    </div>
    <div class="form-group">
       <label>Ngày lên đai</label>
            <input name="NgayCapDai" value="{{ $hocvien->NgayCapDai }}" type="date" class="form-control" >
    </div>

</div>

<div class="col-lg-6">
    <div class="form-group">
       <label>Tên mẹ</label>
            <input name="TenMe" id="TenMe" value="{{ $hocvien->TenMe }}" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp mẹ</label>
            <input name="NgheMe" id="NgheMe" value="{{ $hocvien->NgheMe }}" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại mẹ</label>
            <input name="SoDienThoaiMe" value="{{ $hocvien->SoDienThoaiMe }}" type="number" class="form-control">
    </div>
    <div class="form-group">
       <label>Tên cha</label>
            <input name="TenCha" id="TenCha" value="{{ $hocvien->TenCha }}" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp cha</label>
            <input name="NgheCha" id="NgheCha" value="{{ $hocvien->NgheCha }}" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại cha</label>
            <input name="SoDienThoaiCha" value="{{ $hocvien->SoDienThoaiCha }}" type="number" class="form-control">
    </div>

</div>
    
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Lưu thông tin học viên</button>
        </div>
</form>
@endsection

@section('script')
    <script>
    HoTen = document.getElementById("HoTen");
    DiaChi = document.getElementById("DiaChi");
    TenMe = document.getElementById("TenMe");
    NgheMe = document.getElementById("NgheMe");
    TenCha = document.getElementById("TenCha");
    NgheCha = document.getElementById("NgheCha");
    function validate_HoTen() {
        var validate = HoTen;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    function validate_DiaChi() {
        var validate = DiaChi;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    function validate_TenMe() {
        var validate = TenMe;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    function validate_NgheMe() {
        var validate = NgheMe;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    function validate_TenCha() {
        var validate = TenCha;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    function validate_NgheCha() {
        var validate = NgheCha;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    HoTen.onchange = validate_HoTen;
    DiaChi.onchange = validate_DiaChi;
    TenMe.onchange = validate_TenMe;
    NgheMe.onchange = validate_NgheMe;
    TenCha.onchange = validate_TenCha;
    NgheCha.onchange = validate_NgheCha;
    </script>
@stop