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
	                <input type="text" class="form-control" id="searchKey" placeholder="Search for ...">
	                <select class="selectpicker" id="searchCity">
	               		<?php foreach ($location as $row) {
	               			echo("<option value=".$row->idLocation.">".$row->locationName."</option>");
	               		}
	               		?>
	                </select>
	                <select class="selectpicker" id="searchType">
	                    <?php foreach ($productTypes as $row) {
	               			echo("<option value=".$row->id.">".$row->type."</option>");
	               		}
	               		?>
	                </select>
	            <span class="input-group-btn">
	                <button class="btn btn-default" type="button" onclick="doGoClick();">Go!</button>
	            </span>
	            </div>
	        </div>
	    </div>
	</div>
	<!--define result area -->
<div class="container">
<div class="row">
	<div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 search_result" id="search_result">
        <div class="list_result">
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
    <div class="col-lg-7 col-md-6 hidden-sm hidden-xs maps" id="maps">
    	<div class="map_view" id="map_view"></div>
    </div>
</div>  
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/buysell.js')}}"></script>
<script src="{{ URL::asset('resource/myresource/js/google_maps.js')}}"></script>
</html>