<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail</title>
    <!--JS-->
    <script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap-select.min.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <!--Css-->
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/detailProduct.css') }}">
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
                    <li class="active"><a href="gotobuysell">Mua bán - rao vặt</a></li>
                    <li><a href="gotoshare">Cho tặng đồ</a></li>
                    <li><a href="gotofindLost">Tìm đồ thất lạc</a></li>
                    <?php if($user){
                        echo("<li><a href='gotochatpage' class='glyphicon glyphicon-globe'><span id='notificationIcon' value='".$user->username."'></span></a></li>");
                    } ?>
                    <li class="dropdown" id="profile_user">
                      <?php 
                        if($user){
                            if(($user->isAdmin) == 1){
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
<!--search bar-->

<!--Detail-->
<div class="container detail_product">
    <div class="main_product">
        <div class="big_product">
            <div class="row">
                <div class="col-sm-5 col-md-4 col-xs-12 col-lg-4 picture_erea">
                    <div class="picture_product">
                        <div class="slider">
                            <div class="hidden-xs hidden-sm full_img">
                                <img class="productImg" id="mainImage" src="{{ URL::asset('resource/img/shop.jpg')}}" alt="Find product"/>
                            </div>
                            <div class="thumbnail_img">
                               
                            </div>
                        </div>
                    </div>
                    <div class="social_network"></div>
                </div>
                <div class="col-sm-7 col-md-8 col-xs-12 col-lg-8">
                    <?php
                        echo ("<input type='hidden' id='idProduct' value=".$idProduct.">");
                    ?>
                    <div class="info_product">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-sm" id="title_product"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 well well-sm">
                                Chi phí: <span id="cost_product"></span>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 well well-sm">
                                Điện thoại: <span id="phone_product">1242</span>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-sm">
                                Địa chỉ: <span id="address_product">1242</span>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-sm">
                                Chi tiết: <span id="description_product">1242</span>
                            </div>
                            <?php echo("<a href='chatpage?id=".$idProduct."'><button type='button' class='btn btn-primary'>Liên hệ</button></a>"); ?>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map_view" id="map_view"></div>
    </div>
    <div class="list_product_detail"></div>
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/detail_google_maps.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/common.js')}}"></script>
</html>