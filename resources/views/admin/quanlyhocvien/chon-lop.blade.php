@extends('admin.layouts.layouts')
@section('title-main','Chọn Lớp Học')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item active">Danh sách lớp</li>
</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Lớp</th>
                        <th>Buổi học</th>
                        <th>Học Viên</th>
                        <th>Thêm học viên</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($lops as $lop)
                    <tr @php
                        if($cou%2==1){
                            echo "class=\"info\"";
                        }
                    @endphp>
                        <td>
                            @php
                            echo 5*($lops->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td>{{ $lop->TenLop }}</td>
                        <td>{{ $lop->BuoiHoc }}</td>
                        <td><a href="{{ route('danh-sach-hoc-vien',['MALOP'=>$lop->MaLop]) }}" class="btn btn-outline btn-info">Xem Danh Sách</a></td>
                        <td><a href="{{ route('them-hoc-vien',['MALOP'=>$lop->MaLop]) }}" class="btn btn-outline btn-primary">Thêm Học Viên</a></td>
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