@extends('admin.layouts.layouts')
@section('title-main','Chọn Lớp Đóng tiền')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-dong-tien') }}">Quản lý đóng tiền</a></li>
  <li class="breadcrumb-item active">Chọn lớp đóng tiền</li>
</ol>
<label>Hôm nay : <?php echo date('d-m-Y'); ?></label>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Lớp</th>
                        <th>Buổi học</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach ($lops as $lop)
                    <tr @php
                        if($counter%2==1){
                            echo "class=\"info\"";
                        }
                    @endphp>
                        <td>
                            @php
                            echo 5*($lops->currentPage()-1) + $counter;
                            $counter++;
                            @endphp
                        </td>
                        <td class="hidden">{{ $lop->MaLop }}</td>
                        <td>{{ $lop->TenLop }}</td>
                        <td>{{ $lop->BuoiHoc }}</td>
                        <td><button class="btn btn-outline btn-info" value="">Đóng tiền</button></td>
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
<input  type="date" id="NgayDongTien" disabled " class="hidden" value="<?php echo date('Y-m-d'); ?>" required>
@stop
@section('script')
    <script>
        jQuery(document).ready(function($) {
            $('tr').click(function(){
                var MaLop = $(this).find("td:nth-child(2)").html(); 
                //console.log(Thang+" "+Nam);
                window.location.href = "thuc-hien-dong-tien/"+MaLop;

                
            });
        });
    </script>
@stop