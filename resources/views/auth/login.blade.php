<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Quản lý lớp võ</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    </head>
    <body>
<nav class="navbar navbar-static">
</nav><!-- /.navbar -->


<!-- Begin Body -->
<div class="container">

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Đăng nhập</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group" style="margin: 20px 0;">
                            <input id="email" class="input-login" type="email" name="email" value="" required autofocus>
                        </div>


                        <div class="form-group" style="margin: 5px 0;">
                            <input id="password" class="input-login" type="password"  name="password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-info btn-lg btn-block">Truy cập</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
            
</div>
    <!-- script references -->
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/all.js') }}"></script>
    <script type="text/javascript">
    v2 = document.getElementById("v3");

    function validate_az_AZ() {
        var validate = v2;
        //var special = /^[!-/:-@{-~[-`]+$/;
        var check_special = 0;
        for (var i = 0, len = validate.value.length; i < len; i++) {
            if(/^[!-/:-@{-~[-`@^#$"'<>]+$/.test(validate.value[i]) == true){
                check_special = 1;
            }
        }
        if(check_special == 1){
            validate.setCustomValidity("Don't use numbers or special characters !");
        }else{
            validate.setCustomValidity("");
        }
    }
    v2.onchange = validate_az_AZ;
    </script>
    </body>
</html>