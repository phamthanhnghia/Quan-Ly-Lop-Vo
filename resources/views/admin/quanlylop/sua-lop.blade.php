@extends('admin.layouts.layouts')
@section('title-main')
    <b>Thay đổi thông tin lớp {{ $lop->TenLop }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-lop') }}">Danh sách lớp</a></li>
  <li class="breadcrumb-item active">Thay đổi lớp</li>
</ol>
<form method="post" action="{{ route('luu-thong-tin-lop') }}" class="from-content" role="form">
    <input type="hidden"  name="_token" value="{{ csrf_token() }}">
    <input type="hidden"  name="MaLop" value="{{ $lop->MaLop }}">
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <label>Tên lớp</label>
                <input class="form-control" id="TenLop" value="{{ $lop->TenLop }}" name="TenLop">
            </div>
          
            <div class="form-group">
                <label>Học phí</label>
                <input type="number" class="form-control" value="{{ $lop->HocPhi }}" name="HocPhi" >
                <p class="help-block">Ví dụ : 100000 (VNĐ)</p>
            </div>

            <div class="row">
                <div class="col-sm-3" style="">
                    <div class="form-group">
                    <label>Buổi</label>
                        <select class="form-control" name="BuoiHoc_Buoi">
                            <option value="Sáng">Sáng</option>
                            <option value="Chiều">Chiều</option>
                            <option value="Tối">Tối</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3" style="">
                    <div class="form-group">
                    <label>Ngày</label>
                        <select class="form-control" name="BuoiHoc_Thu1">
                            <option value="Thứ 2">Thứ 2</option>
                            <option value="Thứ 3">Thứ 3</option>
                            <option value="Thứ 4">Thứ 4</option>
                            <option value="Thứ 5">Thứ 5</option>
                            <option value="Thứ 6">Thứ 6</option>
                            <option value="Thứ 7">Thứ 7</option>
                            <option value="Chủ nhật">Chủ nhật</option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-3" style="">
                <div class="form-group">
                    <label>Ngày</label>
                        <select class="form-control" name="BuoiHoc_Thu2">
                            <option value=""></option>
                            <option value="Thứ 2">Thứ 2</option>
                            <option value="Thứ 3">Thứ 3</option>
                            <option value="Thứ 4">Thứ 4</option>
                            <option value="Thứ 5">Thứ 5</option>
                            <option value="Thứ 6">Thứ 6</option>
                            <option value="Thứ 7">Thứ 7</option>
                            <option value="Chủ nhật">Chủ nhật</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3" style="">
                <div class="form-group">
                    <label>Ngày</label>
                        <select class="form-control" name="BuoiHoc_Thu3">
                            <option value=""></option>
                            <option value="Thứ 2">Thứ 2</option>
                            <option value="Thứ 3">Thứ 3</option>
                            <option value="Thứ 4">Thứ 4</option>
                            <option value="Thứ 5">Thứ 5</option>
                            <option value="Thứ 6">Thứ 6</option>
                            <option value="Thứ 7">Thứ 7</option>
                            <option value="Chủ nhật">Chủ nhật</option>
                        </select>
                    </div>
                </div>
              </div>
            <div class="form-group" >
                <label>Ngày học</label>
                <input name="NgayBatDau" value="{{ $lop->NgayBatDau }}" type="date" class="form-control" >
            </div>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
    <button type="submit" class="btn btn-outline btn-info">Lưu Thông Tin Lớp</button>
</form>
@endsection

@section('script')
    <script>
    TenLop = document.getElementById("TenLop");
    function validate_TenLop() {
        var validate = TenLop;
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
    TenLop.onchange = validate_TenLop;
    </script>
@stop