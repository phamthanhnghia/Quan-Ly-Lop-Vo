@extends('admin.layouts.layouts')
@section('title-main','Danh sách')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
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
                        <th>Chi tiết</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>
                            1
                        </td>
                        <td>kjsdfksjdf</td>
                        <td>dsjfhska</td>
                        <td>ssdssds</td>
                        <td>sdfsadfas</td>
                        <td>lkdsfiusd</td>
                        <td><a href="" class="btn btn-outline btn-info">Xem</a></td>
                        <td><a href="" class="btn btn-outline btn-warning">Sửa</a></td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
@stop