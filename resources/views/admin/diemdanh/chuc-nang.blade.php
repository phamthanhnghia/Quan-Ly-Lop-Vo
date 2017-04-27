@extends('admin.layouts.layouts')
@section('title-main','Quản Lý Điểm Danh')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item active">Quản lý điểm danh</li>
</ol>
<div class="row">
  <div class="col-sm-6">
    <a href="{{ route('chon-lop-diem-danh') }}">
        <div class="panel panel-primary">
            <div class="style_heading_diemdanh">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" id="main_text">
                        <div><h3>Điểm danh học viên</h3></div>
                    </div>
                </div>
            </div>
            
                <div class="panel-footer">
                    <span class="pull-left"> &nbsp;</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
        </div>
    </a>
</div>
  <div class="col-sm-6">
        <a href="{{ route('chon-lop-ngay-thong-ke') }}">            
        <div class="panel panel-primary">
            <div class="style_heading_success">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" id="main_text">
                        <div><h3>Lịch sử điểm danh</h3></div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <span class="pull-left"> &nbsp;</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
            
        </div>
        </a>
</div>
</div>
@stop