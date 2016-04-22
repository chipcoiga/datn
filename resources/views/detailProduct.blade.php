<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>
	<header>
		<div class="navbar navbar-default navbar-static-top header" id="header">
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
<!--search bar-->
<div class="container" id="search_bar">
    <div class="col-lg-12 search_bar">
        <div class="col-lg-6 search_bar">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for ...">
                <select class="selectpicker ">
                    <option>Hồ chí minh</option>
                    <option>Phan rang tháp chàm</option>
                    <option>er</option>
                </select>
                <select class="selectpicker">
                    <option>Máy tính, điện tử</option>
                    <option>we</option>
                    <option>hcm</option>
                </select>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div>
        </div>
    </div>
</div>

<!--Detail-->
<div class="container detail_product">
    <div class="main_product">
        <div class="big_product">
            <div class="row">
                <div class="col-sm-5">
                    <div class="picture_product">
                        <div class="slider">
                            <div class="full_img">
                                <img class="productImg" src="{{ URL::asset('resource/img/shop.jpg')}}" alt="Find product"/>
                            </div>
                            <div class="thumbnail_img">
                                <img class="productImg" src="{{ URL::asset('resource/img/shop.jpg')}}" alt="Find product"/>
                                <img class="lostImg" src="{{ URL::asset('resource/img/search.jpg')}}" alt="Lost something"/>
                                <img class="shareImg" src="{{ URL::asset('resource/img/share.jpg')}}" alt="Share something"/>
                                <img class="lostImg" src="{{ URL::asset('resource/img/shop.jpg')}}" alt="Lost something"/>
                            </div>
                        </div>
                    </div>
                    <div class="social_network"></div>
                </div>
                <div class="col-sm-7">
                    <div class="info_product">
                        <?php
                            echo $data;
                            echo '<script type="text/javascript">'
                               , 'showAll();'
                               , '</script>'
                            ;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="map_view" id="map_view"></div>
    </div>
    <div class="list_product_detail"></div>
</div>
</body>
<script src="{{ URL::asset('resource/myresource/js/google_maps.js')}}"></script>
</html>