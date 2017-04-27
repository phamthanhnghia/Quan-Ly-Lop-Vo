@extends('admin.layouts.layouts')
@section('title-main')
<b>Học viên lớp {{ $TenLop }} đã đóng tiền {{ $Thang }}/{{ $Nam }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-dong-tien') }}">Quản lý đóng tiền</a></li>
  <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Chọn lớp thống kê</a></li>
  <li class="breadcrumb-item active">Thống kê đóng tiền</li>
</ol>
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
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($hocviens as $hocvien)
                    <tr>
                        <td>
                            @php
                            echo 10*($hocviens->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td>{{ $hocvien->HoTen  }}</td>
                        <td>{{ $hocvien->NgaySinh }}</td>
                        <td>{{ $hocvien->Phai }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        <td>{{ $hocvien->DienThoai }}</td>
                        
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
    $('#confirmation').on('click', function () {
        return confirm("Bạn có chắc muốn xóa học viên này !");
    });
</script>
@stop