$( document ).ready(function() {
	console.log("ready");
    var h = $(window).height();
    $("#search_result").css('height',(h-100));
});

    $(window).resize(function(){
        var h = $(window).height();
        $("#search_result").css('height',(h-100));
    });
