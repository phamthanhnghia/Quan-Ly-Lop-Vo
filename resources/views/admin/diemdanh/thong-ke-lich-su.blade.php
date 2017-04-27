@extends('admin.layouts.layouts')
@section('title-main')
Thống kê lịch sử điểm danh của học viên lớp <b>{{ $lop->TenLop }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-diem-danh') }}">Quản lý điểm danh</a></li>
  <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Chọn ngày lớp thống kê</a></li>
  <li class="breadcrumb-item active">Thống kê</li>
</ol>
<label> Từ ngày: {{ date("d-m-Y", strtotime($NgayBatDau)) }}- Đến ngày : @php
    echo date('d-m-Y');
@endphp</label>

<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Cấp Đai</th>
                        <th>Điện Thoại</th>
                        <th>Lần đi học</th>
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
                        <td>{{ date("d/m/Y", strtotime($hocvien->NgaySinh)) }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        <td>{{ $hocvien->DienThoai }}</td>
                        <td>{{ $hocvien->count }}</td>
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
    $(document).ready(function(){
        $('tr').change(function(){
            
        });
    });
</script>
@stop