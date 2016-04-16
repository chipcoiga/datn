<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>
	<header>
		<div class="navbar navbar-default navbar-static-top header">
		        <div class="container">
		            <div class="navbar-header">
		                <a class="navbar-brand" href="/">LOGO</a>
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
		                <li><a href="buysell">Mua bán - rao vặt</a></li>
		                <li><a href="share">Cho tặng đồ</a></li>
		                <li><a href="findLost">Tìm đồ thất lạc</a></li>
		                <li><a href="#">Đăng nhập</a></li>
		            </ul>
		        </div>
		    </div>
	</header>	
	<div class="container">
	    <div class="">
	        <div class="col-lg-6 search_bar">
	            <div class="input-group">
	                <input type="text" class="form-control" placeholder="Search for ...">
	                <select class="selectpicker ">
	               		<?php foreach ($location as $row) {
	               			echo("<option>".$row->locationName."</option>");
	               		}
	               		?>
	                </select>
	                <select class="selectpicker">
	                    <?php foreach ($productTypes as $row) {
	               			echo("<option>".$row->type."</option>");
	               		}
	               		?>
	                </select>
	            <span class="input-group-btn">
	                <button class="btn btn-default" type="button">Go!</button>
	            </span>
	            </div>
	        </div>
	    </div>
	</div>
	<!--define result area -->
<div class="container">
    <div class="col-lg-4 search_result" id="search_result">
        <ul class="list_result">
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
            <li>abc</li>
        </ul>     
    </div>
    <div class="maps" id="googleMap"></div>
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/buysell.js')}}"></script>
</html>