@extends('admin.layouts.layouts')
@section('title-main','Chọn lớp thống kê lịch sử đóng tiền')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-dong-tien') }}">Quản lý đóng tiền</a></li>
  <li class="breadcrumb-item active">Chọn lớp thống kê</li>
</ol>
<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
<input id="NgayHienTai" type="date" class="hidden" value="<?php echo date('Y-m-d'); ?>" required>
<div class="panel panel-default">

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-4">
                <label>Tháng :</label>
                <input  type="number"  name="Thang" id="Thang" class="form-control" value="<?php echo date('m'); ?>" required>
            </div>
            <div class="col-xs-4">
                <label>Năm :</label>
                <input  type="number"  name="Nam" id="Nam" class="form-control" value="<?php echo date('Y'); ?>" required>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Lớp</th>
                        <th>Ngày bắt đầu</th>
                        <th>Buổi học</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($lops as $lop)
                    <tr>
                        <td>
                            @php
                            echo 5*($lops->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td class="hidden">{{ $lop->MaLop }}</td>
                        <td>{{ $lop->TenLop }}</td>
                        <td>{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime($lop->NgayBatDau))) }}</td>
                        <td>{{ $lop->BuoiHoc }}</td>
                        <td><input type="button" class="btn btn-outline btn-info" value="Thống kê"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lops->links() }}
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
@stop

@section('script')
    <script>
    $(document).ready(function(){
        $('tr').click(function(){
            var MaLop = $(this).find('td:nth-child(2)').html();
            var TenLop = $(this).find('td:nth-child(3)').html();
            var Thang = $('#Thang').val();
            var Nam = $('#Nam').val();
            var CSRF_TOKEN = $('#_token').val();
            window.location.href = "thong-ke-lich-su-dong-tien/"+MaLop+"@@"+Thang+"@@"+Nam+"@@"+TenLop;
        });
    });
    </script>
@stop