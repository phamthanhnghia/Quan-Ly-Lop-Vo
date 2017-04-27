@extends('admin.layouts.layouts')
@section('title-main')
    <b>Thông tin đóng tiền học viên {{ $hocvien->HoTen }}</b>
@stop
@section('header-main')
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-dong-tien') }}">Quản lý đóng tiền</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chon-lop-dong-tien') }}">Chọn lớp đóng tiền</a></li>
  <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Danh sách đống tiền</a></li>
  <li class="breadcrumb-item active">Đóng tiền</li>
</ol>
    <label>Ngày : <?php echo date('d-m-Y'); ?></label>
    <form method="post" action="" class="from-content" role="form">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
        <input  type="text" id="MaHocVien" name="MaHocVien" class="hidden" value="{{ $hocvien->MaHocVien }}" required>
        <input  type="text" id="MaLop" name="MaLop" class="hidden" value="{{ $lop->MaLop }}" required>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
           <label>Họ tên: <font color="#5054BA">{{ $hocvien->HoTen }}</font></label>
        </div>
        <div class="form-group">
            <label>Lớp:<font color="#5054BA"> {{ $lop->TenLop }}</font></label>
        </div>
        <div class="form-group">
            <label>Học Phí: <font color="#5054BA">{{ $lop->HocPhi }}</font></label>
        </div>
        <div  class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label>Năm :</label>
                            <input  type="number" id="Nam"  name="Nam" min="<?php echo date('Y')-1; ?>" max="<?php echo date('Y')+1; ?>" class="form-control" value="<?php echo date('Y'); ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Tháng 1 :</label>
                        @php
                            if($ChuoiThang[1] =="0"){
                                echo "<td><input class=\"main\" id=\"T1\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T1\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            
                    </div>
                    <div class="form-group">
                        <label>Tháng 5 :</label>
                        @php
                            if($ChuoiThang[5] =="0"){
                                echo "<td><input class=\"main\" id=\"T5\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T5\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T5" class="main"  id="T5" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 9 :</label>
                        @php
                            if($ChuoiThang[9] =="0"){
                                echo "<td><input class=\"main\" id=\"T9\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T9\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T9" class="main"  id="T9" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Tháng 2 :</label>
                        @php
                            if($ChuoiThang[2] =="0"){
                                echo "<td><input class=\"main\" id=\"T2\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T2\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T2" class="main" id="T2" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 6 :</label>
                        @php
                            if($ChuoiThang[6] =="0"){
                                echo "<td><input class=\"main\" id=\"T6\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T6\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T6" class="main" id="T6" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 10:</label>
                        @php
                            if($ChuoiThang[10] =="0"){
                                echo "<td><input class=\"main\" id=\"T10\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T10\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T10" class="main" id="T10" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Tháng 3 :</label>
                        @php
                            if($ChuoiThang[3] =="0"){
                                echo "<td><input class=\"main\" id=\"T3\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T3\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T3" class="main" id="T3" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 7 :</label>
                        @php
                            if($ChuoiThang[7] =="0"){
                                echo "<td><input class=\"main\" id=\"T7\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T7\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T7" class="main" id="T7" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 11:</label>
                        @php
                            if($ChuoiThang[11] =="0"){
                                echo "<td><input class=\"main\" id=\"T11\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T11\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T11" class="main" id="T11" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Tháng 4 :</label>
                        @php
                            if($ChuoiThang[4] =="0"){
                                echo "<td><input class=\"main\" id=\"T4\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T4\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T4" class="main" id="T4" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 8 :</label>
                        @php
                            if($ChuoiThang[8] =="0"){
                                echo "<td><input class=\"main\" id=\"T8\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T8\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T8" class="main" id="T8" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                    <div class="form-group">
                        <label>Tháng 12:</label>
                        @php
                            if($ChuoiThang[12] =="0"){
                                echo "<td><input class=\"main\" id=\"T12\" type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input class=\"main\" id=\"T12\" type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                            {{-- <td><input name="T12" class="main" id="T12" type="checkbox" data-toggle="toggle"></td> --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="add"></div>
        <div class="form-group">
            {{-- <button type="button" id="btn" class="btn btn-success">Thêm</button> --}}
            {{-- <button id="btn-btn" type="button" class="btn btn-success">Lưu</button> --}}
        </div>
    </div>
    
    
</div>

</form>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".main").change(function(){
                var T1,T2,T3,T4,T5,T6,T7,T8,T9,T10,T11,T12;
                if(document.getElementById("T1").checked == true){
                    T1="1";
                }else{
                    T1="0";
                }
                if(document.getElementById("T2").checked == true){
                    T2="1";
                }else{
                    T2="0";
                }
                if(document.getElementById("T3").checked == true){
                    T3="1";
                }else{
                    T3="0";
                }
                if(document.getElementById("T4").checked == true){
                    T4="1";
                }else{
                    T4="0";
                }
                if(document.getElementById("T5").checked == true){
                    T5="1";
                }else{
                    T5="0";
                }
                if(document.getElementById("T6").checked == true){
                    T6="1";
                }else{
                    T6="0";
                }
                if(document.getElementById("T7").checked == true){
                    T7="1";
                }else{
                    T7="0";
                }
                if(document.getElementById("T8").checked == true){
                    T8="1";
                }else{
                    T8="0";
                }
                if(document.getElementById("T9").checked == true){
                    T9="1";
                }else{
                    T9="0";
                }
                if(document.getElementById("T10").checked == true){
                    T10="1";
                }else{
                    T10="0";
                }
                if(document.getElementById("T11").checked == true){
                    T11="1";
                }else{
                    T11="0";
                }
                if(document.getElementById("T12").checked == true){
                    T12="1";
                }else{
                    T12="0";
                }
                var CSRF_TOKEN = $('#_token').val();
                var Nam = $('#Nam').val();
                var MaLop = $('#MaLop').val();
                var MaHocVien = $('#MaHocVien').val();
                //console.log(MaLop+MaHocVien);
                $.ajax({ 
                    url: "dong-tien",
                    method : "POST",
                    cache : false,
                    data : {
                        _token: CSRF_TOKEN,
                        MaLop : MaLop,
                        MaHocVien : MaHocVien,
                        Nam : Nam,
                        T1 : T1,
                        T2 : T2,
                        T3 : T3,
                        T4 : T4,
                        T5 : T5,
                        T6 : T6,
                        T7 : T7,
                        T8 : T8,
                        T9 : T9,
                        T10 : T10,
                        T11 : T11,
                        T12 : T12
                    },
                    success : function(data){
                        console.log(data);
                    }
                });
            });
            
            // $("#btn").click(function(){
            //     // var html = "<div class=\"form-group\"><div class=\"row\">";
            //     // html = html+"<div class=\"col-xs-4\">";
            //     // html = html+"<label>Tháng :</label>";
            //     // html = html+"<input  type=\"month\"  id=\"Thang\" class=\"form-control\" value=\"\" required>";
            //     // html = html "</div></div></div>";
            //     var html = $("#ThemThang").html();
            //     html = "<div class=\"form-group\">"+html+"</div>"; 
            //     //console.log("<div class=\"form-group\">"+html+"</div>")
            //     $(".add").append(html);
            // });
        });
    </script>
@stop