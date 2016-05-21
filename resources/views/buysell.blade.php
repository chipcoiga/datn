	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Buy - Sell</title>
		<!--JS-->
		<script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
		<script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
		<script src="{{ URL::asset('resource/js/bootstrap-select.min.js')}}"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<!--Css-->
		<link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap-select.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/buysell.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/common.css') }}">
	</head>
	<body>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
	<div class="navbar navbar-default navbar-form form-group search_bar">
		<input type="text" class="col-lg-3 form-control" id="searchKey" placeholder="Search for ...">

		<select class="form-control" id="searchCity">
			<?php foreach ($location as $row) {
				echo("<option value=".$row->place_id.">".$row->locationName."</option>");
			}
			?>
		</select>
		<select class="form-control" id="searchType">
			<?php foreach ($productTypes as $row) {
				echo("<option value=".$row->id.">".$row->type."</option>");
			}
			?>
		</select>
		
		<button class="btn btn-default" type="button" onclick="doGoClick();">Go!
		</button>
		<a href="gotopostbuysell"><button class="btn btn-success" type="button">Rao vặt</button></a>
	</div>
</div>
<!--define result area -->
<div class="container">
	<div class="row">
		<div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 search_result" id="search_result">
			<div class="list_result">
				<span class="msg"></span>
				<div class="show_result">
					<div class="li_tag">
					<div class="thumbnails_item" onclick='doViewMaps("a");'></div>
					<div class="info_item">
						<div class="content_item" onclick='doViewMaps("a");'>
							<div class="title_item">a</div>
							<div class="cost_item">b</div>
							<div class="timePost_item">c</div>
						</div>           		
						<div class="button_item">
							<a href="#"><button>Chi tiết</button></a>
						</div>
					</div>
				</div> 
				</div>				           
			</div>     
		</div>
		<div class="col-lg-7 col-md-6 hidden-sm hidden-xs maps" id="maps">
			<div class="map_view" id="map_view"></div>
		</div>
	</div>  
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/google_maps_buysell.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/common.js')}}"></script>
</html>