@extends('admin.layouts.layouts')
@section('title-main','Danh sách Lớp')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item active">Danh sách lớp</li>
</ol>
 <div class="row">
    <a href="{{ route('them-lop') }}"><button type="button" class="btn btn-primary" style="float: right;">Tạo lớp mới</button></a>
</div>
<div class="panel panel-default">
    <div class="panel-body">
       
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Lớp</th>
                        <th>Ngày bắt đầu</th>
                        <th>Học phí</th>
                        <th>Buổi học</th>
                        <th>Học viên</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($lops as $lop)

                    <div class="modal fade" id="{{ $lop->MaLop }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                          </div>
                          <div class="modal-body">
                            Bạn có chắc chắn muốn xóa lớp này ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            <a href="{{ route('xoa-lop',['MaLop'=>$lop->MaLop]) }}" id="confirmation" class="btn btn-outline btn-danger">Xóa</a>
                          </div>
                        </div>
                      </div>
                    </div>


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
                        <td>{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime($lop->NgayBatDau))) }}</td>
                        <td>{{ $lop->HocPhi }}</td>
                        <td>{{ $lop->BuoiHoc }}</td>
                        <td><a href="{{ route('danh-sach-hoc-vien',['MALOP'=>$lop->MaLop]) }}" class="btn btn-outline btn-info">Xem Danh Sách</a></td>
                        <td><a href="{{ route('sua-lop',['MaLop'=>$lop->MaLop]) }}" class="btn btn-outline btn-warning">Thay đổi</a></td>
                        <td><button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#{{ $lop->MaLop }}">Xóa Lớp</button></td>
                        {{-- <td><a href="{{ route('xoa-lop',['MaLop'=>$lop->MaLop]) }}" id="confirmation" class="btn btn-outline btn-danger">Xóa</a></td> --}}
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
   
    </script>
@stop