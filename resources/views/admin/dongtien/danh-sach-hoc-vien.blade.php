@extends('admin.layouts.layouts')
@section('title-main','Danh Sách Học Viên')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-dong-tien') }}">Quản lý đóng tiền</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chon-lop-dong-tien') }}">Chọn lớp đóng tiền</a></li>
  <li class="breadcrumb-item active">Danh sách đóng tiền</li>
</ol>
<label>Đóng tiền ngày : <?php echo date('d-m-Y'); ?></label>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Cấp Đai</th>
                        <th>Điện thoại</th>
                        <th>Thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($hocviens as $hocvien)
                    <tr @php
                        if($cou%2==1){
                            echo "class=\"info\"";
                        }
                    @endphp>
                        <td>
                            @php
                            echo 10*($hocviens->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td class="hidden">{{ $hocvien->MaHocVien }}</td>
                        <td>{{ $hocvien->HoTen  }}</td>
                        <td>{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime( $hocvien->NgaySinh))) }}</td>
                        <td>{{ $hocvien->Phai }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        <td>{{ $hocvien->DienThoai }}</td>
                        <td><a href="{{ route('thong-tin-hoc-vien-dong-tien',['MaHocVien'=>$hocvien->MaHocVien]) }}"><button class="btn btn-outline btn-info">Đóng tiền</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $hocviens->links() }}
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
@stop
@section('script')
<script>
    jQuery(document).ready(function($) {
        $('tr').click(function(){

            
        });
    });
</script>
@stop