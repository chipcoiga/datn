<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Index</title>
    <!--JS-->
    <script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
    <!--Css-->
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/footer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/common.css') }}">
</head>
<body>
        <header>
            <div class="navbar navbar-default navbar-static-top header">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="gotoWelcome">LOGO</a>
                        <button type='button' class='navbar-toggle collapsed'
                        data-toggle='collapse'
                        data-target='#myNavbar'>
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right collapse
                navbar-collapse" id="myNavbar">
                    <li><a href="gotobuysell">Mua bán - rao vặt</a></li>
                    <li><a href="gotoshare">Cho tặng đồ</a></li>
                    <li><a href="gotofindLost">Tìm đồ thất lạc</a></li>
                    <?php if($user){
                        echo("<li><a href='gotochatpage' class='glyphicon glyphicon-globe'><span id='notificationIcon' value='".$user->username."'></span></a></li>");
                    } ?>
                    <li class="dropdown" id="profile_user">
                      <?php 
                        if($user){
                            if($user->isAdmin == 1){
                                echo("<a href='' class='dropdown-toggle' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><span >Admin</span></a><ul class='dropdown-menu' aria-labelledby='dropdownMenu1'><li><a href='domanagement'>Quản lý</a></li><li><a href='dologout' >Đăng xuất</a></li></ul>");
                            }else{
                                echo("<a href='dologout'><span>[".$user->username."] Đăng xuất</span></a>");
                            }
                        }else{
                            echo("<a href='' class='dropdown-toggle' data-toggle='modal' data-target='#login_register'><span >Đăng nhập/Đăng ký</span></a>");
                        } ?>
                
                    </li>
                </ul>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_register" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content panel panel-default">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" id="close_login_form">&times;</button>
                </div>
                <div class="row modal-body">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default form-group form_component">
                            <div class="panel-heading">Login</div>
                            <input class="form-control form_item" type="text" name="username" id="username_login" placeholder="username..."></input>
                            <input class="form-control form_item" type="password" name="password" id="password_login" placeholder="password"></input>                           
                            <button class=" btn btn-primary" type="button" onclick="dologin();">Login</button>
                            <a class="" href="">Quên tài khoản.</a>         
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default form-group form_component">
                            <div class="panel-heading">Register</div>
                            <input class="form-control form_item" type="text" name="username" id="username_register" placeholder="username..."></input>
                            <input class="form-control form_item" type="text" name="sdt" id="sdt_register" placeholder="sdt..."></input>
                            <input class="form-control form_item" type="password" name="password" id="password_register" placeholder="password..."></input>
                            <input class="form-control form_item" type="password" name="repassword" id="repassword_register" placeholder="Re password..."></input>
                            <button class=" btn btn-primary" type="button" onclick="doregister();">Register </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="container">
        <div class="content">
            <div class="col-sm-12">
                <figure class="">
                    <div class="img">
                        <a href="gotobuysell"><img class="productImg" src="{{ URL::asset('resource/img/shop.jpg')}}" alt="Find product"/></a>
                        <a href="gotoshare"><img class="lostImg" src="{{ URL::asset('resource/img/search.jpg')}}"/></a>        
                        <a href="gotofindLost"><img class="shareImg" src="{{ URL::asset('resource/img/share.jpg')}}"/></a>        

                    </div>
                </figure>
            </div>
        </div>

        <nav class="footer text-center navbar navbar-default navbar-fixed-bottom">
            <div class="row footer text-center">
                copyright chipcoiga 2016
            </div>
        </nav>
    </div>
</body>
<script src="{{ URL::asset('resource/myresource/js/common.js')}}"></script>
</html>