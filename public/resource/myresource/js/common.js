$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//var currentUser;
function dologin(){
    var username = $('#username_login').val();
    var password = $('#password_login').val();
    if(username && password){
        $.post("dologin",{
            username: username,
            password: password
        },function(data){
            $('#close_login_form').click();
            if(!data[0]){
                alert('Đăng nhập thất bại');
            }else{
                //currentUser=data[1].username;
                if(data[1].isAdmin){
                    //console.log("admin");
                    var content_li = "<a href='' class='dropdown-toggle' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><span >Admin</span></a><ul class='dropdown-menu' aria-labelledby='dropdownMenu1'><li><a href='domanagement'>Quản lý</a></li><li><a href='#'' onclick='dologout();'>Đăng xuất</a></li></ul>";
                    $('#profile_user').html(content_li);
                }else{
                    var content_li = "<a href='' onclick='dologout();'><span>["+data[1].username+"] Đăng xuất</span></a>";
                    $('#profile_user').html(content_li);
                }
                //console.log("f");
                $("<li><a href='gotochatpage' class='glyphicon glyphicon-globe'><span id='notificationIcon'></span></a></li>").insertBefore("#profile_user");
            }
            //console.log(data);
        });
    }else{
        alert("Vui lòng điền đầy đủ thông tin");
    }
}

function dologout(){
    var content_li = "<a href='' class='dropdown-toggle' data-toggle='modal' data-target='#login_register'><span >Đăng nhập/Đăng ký</span></a>";
            $('#profile_user').html(content_li);
}

function doregister(){
    var username = $('#username_register').val();
    var sdt= $('#sdt_register').val();
    var password = $('#password_register').val();
    var repassword = $('#repassword_register').val();
    if(username && sdt && password && repassword){
        $.post("doregister",{
            username: username,
            sdt: sdt,
            password: password,
            repassword: repassword
        },function(data){
            if(data[0]){
                $('#close_login_form').click();
                alert('Đăng ký thành công');
            }else{
                alert('Đăng ký thất bại.');
            }
        });
    }else{
        alert("Vui lòng điền đầy đủ thông tin");
    }
}