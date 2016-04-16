<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/search_page.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/footer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resource/myresource/css/header.css') }}">
</head>
<body>
    <div class="header">
        <div class="logo">cvcv</div>
        <nav class="menu">
            <ul class="list-menu">
                <li class="menu-item">Mua bán Mua bán</li>
                <li class="menu-item">Cho tặng Cho tặng</li>
                <li class="menu-item">Đồ thất lạc Đồ thất lạc</li>
                <li class="menu-item">Đăng xuất Đăng xuất</li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <form action="searchkey" method="get">
            <div class="search_box">
                <input name="search_key" type="text" id="search_key" placeholder="Tôi cần ...">
                <div class="location_city">               
                    <select name="city_list" id="city_list" title="city_list">
                        <?php foreach ($location as $city): ?>
                            <option value="<?php echo $city->locationName;?>"><?php echo $city->locationName;?> </option>
                        <?php endforeach ?>                       
                    </select>
                </div>
                <button type="submit" class="button_submit">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <div class="content">
            <div class="menu col-lg-3">
                <h3>menu</h3>
                this is menu pagethis is menu pagethis is menu pagethis is menu pagethis is menu pagethis is menu page
            </div>
            <div class="about-us col-lg-3">
                <h3>about us</h3>
                abount usabount usabount usabount usabount usabount usabount usabount us
            </div>
            <div class="contact-us col-lg-3">
                <h3>contact us</h3>
                contact us this is menu pagethis is menu pagethis is menu pagethis is menu pagethis is menu pagethis is menu
                page
            </div>
            <div class="social-network col-lg-3">
                <h3>social network</h3>
                social networkthis is menu pagethis is menu pagethis is menu pagethis is menu pagethis is menu pagethis is
                menu page
            </div>
        </div>
        <div class="bottom-footer">
            copyright chipcoiga 2016
        </div>
    </div>
</body>

</html>