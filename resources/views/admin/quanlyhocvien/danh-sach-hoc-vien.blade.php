@extends('admin.layouts.layouts')
@section('title-main')
Danh sách học viên
@stop
@section('header-main')
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('danh-sach-lop') }}">Danh sách lớp</a></li>
  <li class="breadcrumb-item active">Danh sách học viên</li>
</ol>
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
                        <th>Điện thoại</th>
                        <th>Chi tiết</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($hocviens as $hocvien)

                    <div class="modal fade" id="{{ $hocvien->MaHocVien }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                          </div>
                          <div class="modal-body">
                            Bạn có chắc chắn muốn xóa học viên này !
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            <a href="{{ route('xoa-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" id="confirmation" class="btn btn-outline btn-danger">Xóa</a>
                          </div>
                        </div>
                      </div>
                    </div>


                    <tr @php
                        if($cou%2==1){
                            echo "class=\"info\"";
                        }else{
                            echo "class=\"warning\"";
                        }
                    @endphp>
                        <td>
                            @php
                            echo 10*($hocviens->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td>{{ $hocvien->HoTen  }}</td>
                        <td>{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime($hocvien->NgaySinh))) }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        <td>{{ $hocvien->DienThoai }}</td>
                        <td><a href="{{ route('xem-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" class="btn btn-outline btn-info">Thông tin</a></td>
                        <td><a href="{{ route('sua-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" class="btn btn-outline btn-warning">Thay đổi</a></td>
                        <td><button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#{{ $hocvien->MaHocVien }}">Xóa học viên</button></td>
                        {{-- <td><a href="{{ route('xoa-hoc-vien',['MaHocVien'=>$hocvien->MaHocVien]) }}" id="confirmation" class="btn btn-outline btn-danger">Xóa</a></td> --}}
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
<script type="text/javascript">
        
    // $('#confirmation').on('click', function () {
    //     return confirm("Bạn có chắc muốn xóa học viên này !");
    // });
</script>
@stop