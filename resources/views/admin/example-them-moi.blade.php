@extends('admin.layouts.layouts')
@section('title-main','Danh sách')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<form method="POST" action="" class="from-content" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
       <label>Họ tên</label>
            <input name="HOTEN" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Giới tính</label>
        <select name="GIOITINH" class="form-control" required>
            <option>Nam</option>
            <option>Nữ</option>
        </select>
    </div>
    <div class="form-group">
       <label>Ngày sinh</label>
            <input name="NGSINH" type="date" class="form-control" required>
    </div>
    <div class="form-group">
       <label>Địa chỉ</label>
            <input name="DIACHI" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại</label>
            <input name="DIENTHOAI" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Cấp đai</label>
        <select name="CAPDAI" class="form-control" >
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
            <input name="NGAYLENDAI" type="date" class="form-control" required>
    </div>
    <div class="form-group">
       <label>Tên mẹ</label>
            <input name="TENME" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp mẹ</label>
            <input name="NGHEME" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại mẹ</label>
            <input name="SDTME" type="number" class="form-control">
    </div>
    <div class="form-group">
       <label>Tên cha</label>
            <input name="TENCHA" class="form-control">
    </div>
    <div class="form-group">
       <label>Nghề nghiệp cha</label>
            <input name="NGHECHA" class="form-control">
    </div>
    <div class="form-group">
       <label>Điện thoại cha</label>
            <input name="SDTCHA" type="number" class="form-control">
    </div>
    

</div>

<div class="col-lg-6">
    <div class="form-group">
        <label>Tên tài khoản</label>
        <input name="USERNAME" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input  name="PASSWORD" id="password" type="password" min="8" class="form-control" required>
        <p class="help-block">Hơn 8 kí tự</p>
    </div>
    <div class="form-group">
        <label>Xác nhận mật khẩu</label>
        <input id="confirm_password" type="password" class="form-control" min="8" required>
    </div>

    <div class="form-group">
        <label>Chọn lớp</label>
        <div class="row">
            <table class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th></th>
                    <th>Tên Lớp</th>
                    <th>Lịch Học</th>
                    <th>Học Phí</th>
                    <th>Ngày Học</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><input type="radio" name="MALOP" value=""></td>
                        <td></td>
                        <td></td>
                        <td><span> &nbsp; VNĐ</span></td>
                        <td></td>
                    </tr>                    
               
                </tbody>
              </table>
        </div>
        <div class="form-group">      
            <label class="btn btn-info" for="my-file-selector">
                <input name="PHOTO" id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                Tải hình ảnh lên
            </label>
            <span class='label label-info' id="upload-file-info"></span>
        </div>
        
    </div>

</div>

	
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Tạo học viên mới</button>
        </div>
</form>
@endsection

@section('script')
    <script>
    $(document).ready(function() {
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");
        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không khớp!");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    });
    </script>
@stop