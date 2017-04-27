@extends('admin.layouts.layouts')
@section('title-main')
    <b>Thêm Học Viên Lớp {{ $TenLop }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-lop') }}">Danh sách lớp</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-hoc-vien',['MALOP'=>$MaLop]) }}">Danh sách học viên</a></li>
  <li class="breadcrumb-item active">Thêm học viên</li>
</ol>

<form method="POST" action="{{ route('tao-hoc-vien') }}" class="from-content" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="MaLop" value="{{ $MaLop }}">
<div class="row">
    <div class="col-lg-6">
    <div class="form-group">
       <label>Họ tên</label>
            <input name="HoTen" id="HoTen" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Giới tính</label>
        <select name="Phai" class="form-control" required>
            <option>Nam</option>
            <option>Nữ</option>
        </select>
    </div>
    <div class="form-group">
       <label>Ngày sinh</label>
            <input name="NgaySinh" type="date" class="form-control" required>
    </div>
    <div class="form-group">
       <label>Địa chỉ</label>
            <input name="DiaChi" id="DiaChi" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại</label>
            <input name="DienThoai" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Cấp đai</label>
        <select name="CapDai" class="form-control" >
          <optgroup label="Trắng">
            <option value="Đai trắng">Đai trắng</option>
          </optgroup>
          <optgroup label="Đai xanh">
            <option value="Đai xanh 1 gạch">Đai xanh 1 gạch</option>
            <option value="Đai xanh 2 gạch">Đai xanh 2 gạch</option>
            <option value="Đai xanh 3 gạch">Đai xanh 3 gạch</option>
          </optgroup>
          <optgroup label="Đai nâu">
            <option value="Đai nâu 1 gạch">Đai nâu 1 gạch</option>
            <option value="Đai nâu 2 gạch">Đai nâu 2 gạch</option>
            <option value="Đai nâu 3 gạch">Đai nâu 3 gạch</option>
          </optgroup>
          <optgroup label="Đai đen">
            <option value="Đai đen 1 đẳng">Đai đen 1 đẳng</option>
            <option value="Đai đen 2 đẳng">Đai đen 2 đẳng</option>
          </optgroup>
        </select>
    </div>
    <div class="form-group">
       <label>Ngày lên đai</label>
            <input name="NgayCapDai" type="date" class="form-control" required>
    </div>

</div>

<div class="col-lg-6">
    <div class="form-group">
       <label>Tên mẹ</label>
            <input name="TenMe" id="TenMe" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp mẹ</label>
            <input name="NgheMe" id="NgheMe" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại mẹ</label>
            <input name="SoDienThoaiMe" id="SoDienThoaiMe" type="number" class="form-control">
    </div>
    <div class="form-group">
       <label>Tên cha</label>
            <input name="TenCha" id="TenCha" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp cha</label>
            <input name="NgheCha" id="NgheCha" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại cha</label>
            <input name="SoDienThoaiCha" id="SoDienThoaiCha" type="number" class="form-control">
    </div>


</div>

    
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Tạo học viên mới</button>
        </div>
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông Báo</h4>
      </div>
      <div class="modal-body">
        Đã thêm học viên mới thành công !
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