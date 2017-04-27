@extends('admin.layouts.layouts')
@section('title-main','Chức Năng')
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<div class="row">
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Home</li>
</ol>
  <div class="col-sm-6">
    <a href="{{ route('chuc-nang-diem-danh') }}">
        <div class="panel panel-primary">
            <div class="style_heading_primary">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" id="main_text">
                        <div><h3>Quản lý điểm danh</h3></div>
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
        <a href="{{ route('chuc-nang-dong-tien') }}">            
        <div class="panel panel-primary">
            <div class="style_heading_success">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" id="main_text">
                        <div><h3>Quản lý đóng tiền</h3></div>
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