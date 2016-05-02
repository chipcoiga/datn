<!DOCTYPE html>
<html>
<head>
	<title>Admin Management</title>
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
		<link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/adminmanagement.css') }}">
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
					<li class="dropdown" id="profile_user">
					<?php 
						if($user != ""){
							if($user->isAdmin){
                    			echo("<a href='' class='dropdown-toggle' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><span >Admin</span></a><ul class='dropdown-menu' aria-labelledby='dropdownMenu1'><li><a href='domanagement'>Quản lý</a></li><li><a href='dologout' >Đăng xuất</a></li></ul>");
			                }
						}?>				  				
					</li>
				</ul>
		</div>
	</div>	
</header>
<div class="container">
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#buysellpost">Quản lý bài đăng</a></li>
	  <li><a data-toggle="tab" href="#usermanage">Quản lý người dùng</a></li>
	</ul>

	<div class="tab-content">
	  <div id="buysellpost" class="tab-pane fade in active">
	    <h3>Menu 1</h3>
	    <div class="row form-group">
		    <div class="col-lg-4 col-md-5 col-sm-6">
		    	<select class="form-control" id="type_filter">
		    		<option value="1">Bài đăng chưa duyệt</option>
		    		<option value="2">Bài đăng quá cũ</option>
		    		<option value="3">Bài đăng vi phạm</option>
		    		<option value="4">Bài đăng đã duyệt</option>
		    	</select>
		    </div>	    	
	    </div>
	    <div class="row">
	    	<div class="context">Tất cả | Chưa duyệt | Đã duyệt | Bài xấu | Bài quá cũ</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-4 col-md-6 col-sm-7 list_action_top">
		    	<div class="col-lg-8 col-md-7 col-sm-8 col-xs-7">
		    		<select class="form-control" id="type_filter">
			    		<option value="1">Duyệt bài</option>
			    		<option value="2">Không duyệt bài</option>
			    		<option value="3">Xóa bài</option>
			    	</select>
		    	</div>
	    		<div class="col-lg-4 col-md-5 col-sm-4 col-xs-5">
	    			<button class="form-control" type="button">Thực hiện</button>
	    		</div>		    
	    	</div>
	    </div>
	    <table class="table table-striped">
		    <head>
    			<td class="checker">
    				<input type="checkbox" id="checker_header"></input>
    			</td>
    			<td>
		    		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs author">
		    			<span>Người đăng</span>
		    		</div>
		    		<div class="col-lg-5 col-md-5 content">
		    			<span>Bài đăng</span>
		    		</div>
		    		<div class="col-lg-3 col-md-3  hidden-sm hidden-xs pictures">
		    			<span>Hình ảnh</span>
		    		</div>
		    		<div class="col-lg-2 col-md-2  hidden-sm hidden-xs day_submit">
		    			<span>Thời gian</span>
		    		</div>
	    		</td>	
		    </head>
	    	<tr>
	    		<td class="checker">
    				<input type="checkbox" id="checker_header"></input>
	    		</td>
	    		<td>
		    		<div class="col-lg-2 col-md-2 author">
		    			<span id="auther_name">s</span>
		    			<span id="auther_sdt">c</span>
		    		</div>
		    		<div class="col-lg-5 col-md-5 content">
		    			<span id="title_post">Tiêu đề</span>
		    			<p id="content_post">contetn post</p>
		    		</div>
		    		<div class="col-lg-3 col-md-3 pictures">sdf</div>
		    		<div class="col-lg-2 col-md-2  day_submit">sdf</div>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td class="checker">
    				<input type="checkbox" name="checker"></input>
	    		</td>
	    		<td>
		    		<div class="col-lg-2 col-md-2 author">
		    			<span id="auther_name">s</span>
		    			<span id="auther_sdt">c</span>
		    		</div>
		    		<div class="col-lg-5 col-md-5 content">
		    			<span id="title_post">Tiêu đề</span>
		    			<p id="content_post">contetn post</p>
		    		</div>
		    		<div class="col-lg-3 col-md-3 pictures">sdf</div>
		    		<div class="col-lg-2 col-md-2  day_submit">sdf</div>
	    		</td>
	    	</tr>
	    </table>
	    <div class="row">    	
	    	<div class="list_action_bottom"></div>
	    </div>
	  </div>
	  <div id="usermanagement" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	</div>	
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/common.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/adminmanagement.js')}}"></script>
</html>