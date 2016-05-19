<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--JS-->
    <script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/socket.io.js')}}"></script>
    <!--Css-->
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/common.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/chatbox.css') }}">
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
                    <li><a href="chatpage" class="glyphicon glyphicon-globe">4</a></li>
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
                        }
                       //echo($endUser);  
                       ?>
                
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
		<div class="conversation-wrap col-lg-3 col-md-3 col-sm-4" id="listUserChat">

		</div>
		<div class="message-wrap col-lg-8 col-md-8 col-sm-7">
			<input type="hidden" id="userChatWith" value=""></input>
			<div class="msg-wrap" id="msg-wrap-box">
				<input type="hidden" value="" name="idgetter"></input>
				<?php 
				if($endUser !=""){
					echo ("<input type='hidden' value='".$endUser->id."' name='idgetter'></input>");
				}
				?>
				<div class="media msg ">
					<hr>
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am</small>
                        <h5 class="media-heading">Naimish Sakhpara</h5>
                        <small class="col-md-9">Location H-2, Ayojan Nagar, Near Gate-3, Near
                            Shreyas Crossing Dharnidhar Derasar,
                            Paldi, Ahmedabad 380007, Ahmedabad,
                            India
                            Phone 091 37 669307
                            Email aapamdavad.district@gmail.com</small>
                    </div>
                    <hr>
                    <a class="pull-right" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="">
                    </a>
                    <div class="media-body">
                        <small class="pull-left time"><i class="fa fa-clock-o"></i> 12:10am</small>
                        <h5 class="pull-right media-heading">Naimish Sakhpara</h5>
                        <small class="col-md-offset-3 col-md-9" style="text-align: right;">Location H-2, Ayojan Nagar, Near Gate-3, Near
                            Shreyas Crossing Dharnidhar Derasar,
                            Paldi, Ahmedabad 380007, Ahmedabad,
                            India
                            Phone 091 37 669307
                            Email aapamdavad.district@gmail.com</small>
                    </div>
                </div>
			</div>
			<div class="input-group send-wrap ">
                <input class="form-control send-message" id="sendMessage" rows="3" placeholder="Write a reply..."/>
                <span class="input-group-btn">
        			<button class="btn btn-default" type="button" onclick="sendMessage();">Send <span class="glyphicon glyphicon-ok-sign"></span></button>
      			</span>
            </div>
		</div>
	</div>
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/chatbox.js')}}"></script>
</html>