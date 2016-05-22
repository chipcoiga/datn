<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--JS-->
    <script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/socket.io.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap-select.min.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_f2LWXwhv7iifDM3aRTyHBobAL8sTgzg&libraries=places"></script>
    <!--Css-->
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap-select.min.css') }}">
    <link href="{{ URL::asset('resource/myresource/css/post_product.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/common.css') }}">
    <title>Find Product</title>
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
                        echo ("<input type='hidden' id='currentUser' value='".$user->username."' style='width: 0; height: 0;' />");
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
	<div class="row">
        <div class="col-lg-7 col-md-5 col-sm-12">
            <form>
                <div class="col-lg-6 col-sm-6">
                    <fieldset class="form-group">
                        <label for="title_product" class="title_product label_title">Tiêu đề</label>
                        <input type="text" class="form-control" id="title_product" maxlength="80"
                               placeholder="Tiêu đề dưới 80 ký tự">
                    </fieldset>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <fieldset class="form-group">
                        <label for="type_product" class="type_product label_title">Danh mục sản phẩm</label>
                        <select class="form-control" id="type_product">
                            <?php foreach ($productTypes as $row) {
						echo("<option value=".$row->id.">".$row->type."</option>");
					}
					?>
                        </select>
                    </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset class="form-group ">
                        <label for="description_detail" class="description_detail label_title">Mô tả chi tiết</label>
                        <textarea class="form-control" id="description_detail" rows="3"
                                  placeholder="Nhập tiếng việt có dấu, dưới 500 ký tự"></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                    <fieldset class="form-group">
                        <label for="address_product_lg" class="address_product_lg label_title">Địa chỉ</label>
                        <input type="text" class="form-control" id="address_product_lg" maxlength="80" onchange="address_onchange_lg();"
                                >
                        <small class="text-muted">Kéo con trỏ ở bản đồ bên cạnh đến địa điểm của bạn</small>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <fieldset class="form-group ">
                        <label for="cost_product" class="cost_product label_title">Giá</label>
                        <input type="number" class="form-control post_address" id="cost_product" placeholder="Đơn vị tiền: VNĐ">
                    </fieldset>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <fieldset class="form-group ">
                        <label for="mobilephone" class="mobilephone label_title">Số điện thoại liên hệ</label>
                        <input type="number" class="form-control" id="mobilephone" maxlength="12"
                               placeholder="Số điện thoại">
                    </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row photo_upload">
                        <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6">
                            <fieldset class="form-group">
                                <input type="file" name="InputFile" id="InputFile_1">
                                <img class="img-thumbnail " id="InputFile1" src="{{ URL::asset('resource/img/photoupload.jpg')}}" alt="your image"/>
                            </fieldset>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6">
                            <fieldset class="form-group">
                                <input type="file" name="InputFile" id="InputFile_2">
                                <img class="img-thumbnail " id="InputFile2" src="{{ URL::asset('resource/img/photoupload.jpg')}}" alt="your image"/>
                            </fieldset>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6">
                            <fieldset class="form-group">
                                <input type="file" name="InputFile" id="InputFile_3">
                                <img class="img-thumbnail " id="InputFile3" src="{{ URL::asset('resource/img/photoupload.jpg')}}" alt="your image"/>
                            </fieldset>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6">
                            <fieldset class="form-group">
                                <input type="file" name="InputFile" id="InputFile_4">
                                <img class="img-thumbnail" id="InputFile4" src="{{ URL::asset('resource/img/photoupload.jpg')}}" alt="your image"/>
                            </fieldset>
                        </div>
                    </div>

                </div>
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                    <fieldset class="form-group">
                        <label for="address_product_sm" class="address_product_sm label_title">Địa chỉ</label>
                        <input type="text" class="form-control" id="address_product_sm" maxlength="80" onchange="address_onchange_sm();" 
                                >
                        <small class="text-muted">Kéo con trỏ ở bản đồ bên dưới đến địa điểm của bạn</small>
                    </fieldset>
                </div>
                <input type="hidden" name="latitude" id="post_latitude" value=""></input>
                <input type="hidden" name="longitude" id="post_longitude" value=""></input>
                <input type="hidden" name="city_code" id="city_code" value=""></input>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="btn btn-primary" onclick="doPostBuySell();">Đăng bán</button>
                </div>
            </form>
        </div>
        <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12">
            <div class="maps" id="map_view"></div>
        </div>
    </div>
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/post_product.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/google_maps_postbuysell.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/common.js')}}"></script>
</html>