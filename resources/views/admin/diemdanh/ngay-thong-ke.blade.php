@extends('admin.layouts.layouts')
@section('title-main','Chọn ngày và lớp thống kê lịch sử điểm danh')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-diem-danh') }}">Quản lý điểm danh</a></li>
  <li class="breadcrumb-item active">Chọn ngày lớp thống kê</li>
</ol>
<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

<div class="panel panel-default">

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-3">
                <label>Từ ngày : <input name="NgayBatDau" id="NgayBatDau" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required></label>
            </div>
            <div class="col-xs-3">
                <label> - Đến ngày : <input id="NgayHienTai" type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo date('Y-m-d'); ?>" required></label>
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
                        <th>Bắt đầu</th>
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
            var NgayBatDau = $('#NgayBatDau').val();
            var NgayHienTai = $('#NgayHienTai').val();
            var CSRF_TOKEN = $('#_token').val();
            window.location.href = "thong-ke-lich-su/"+MaLop+"@@"+NgayBatDau;
        });
    });
    </script>
@stop