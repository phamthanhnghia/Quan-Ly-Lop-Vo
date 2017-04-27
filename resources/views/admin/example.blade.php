@extends('admin.layouts.layouts')
@section('title-main','Chọn học viên')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<form action="" method="post" class="from-content" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="content">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Tên Lớp</label>
                <select name="MALOP" class="form-control" >
                    <option value="-1">Tất cả</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline btn-info">Xem danh sách</button>
        </div>
        <div class="col-lg-6">
        </div>
    </div>
</form>
@stop