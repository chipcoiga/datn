<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!--JS-->
    <script src="{{ URL::asset('resource/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('resource/js/bootstrap.min.js')}}"></script>
    <!--Css-->
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/footer.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
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
                        <li><a href="#">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
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

</html>