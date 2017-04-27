<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Quản lý lớp võ</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.min.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-static">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}" target=""><b>Trang Chủ</b></a>
                    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                    <ul class="nav navbar-right navbar-nav">
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                            <ul class="dropdown-menu" style="padding:12px;">
                                <form class="form-inline">
                                    <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                                </form>
                            </ul>
                        </li> --}}
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thông tin</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Đăng xuất</a></li>
                            </ul>
                        </li> --}}

                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            {{-- thu nghiem --}}


                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Begin Body -->
        <div class="container">

        <div class="no-gutter row">
            <div class="col-md-2">
                <div class="panel panel-default" id="sidebar">
                    <div class="panel-heading" style="background-color:#3b4054;color:#fff;">Lựa Chọn</div>
                    <div class="panel-body">
                        <ul class="nav nav-stacked">
                            <li><a href="{{ route('danh-sach-lop-them-hoc-vien') }}">Quản lý học viên</a></li>
                            <li><a href="{{ route('danh-sach-lop') }}">Quản lý lớp</a></li>
                            <li><a href="{{ route('chuc-nang-diem-danh') }}">Điểm danh</a></li>
                            <li><a href="{{ route('chuc-nang-dong-tien') }}">Đóng tiền</a></li>
                        </ul>
                    </div>
                </div>
                <!--/panel body-->
            </div>
            <!--/panel-->
            <!--mid column-->
            <div class="col-md-10">
                <div class="panel" id="midCol">
                    <div class="panel-heading" style="background-color:#555;color:#eee;">@yield('title-main')</div>
                    <div class="panel-body">
                        <div>@yield('header-main')</div>
                        {{-- <a href="{{ URL::previous() }}">Go Back</a>--}}    
                        
                        @yield('content')
                    </div>
                </div>
                <!--/panel-->
            </div>
            <!--/end mid column-->
            <!-- right content column-->
            </div>
        </div>
        <!-- script references -->
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
        @yield('script')
    </body>
</html>