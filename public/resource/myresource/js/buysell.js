
function doGoClick(){
	var searchKey = $("#searchKey").val();
	var searchCity = $("#searchCity").val();
	var searchType = $("#searchType").val();
	$.post("doSearch",
		{
			searchKey: searchKey,
			searchCity: searchCity,
			searchType: searchType
		}
		,function(data){
		console.log(data);
		if(data){
			$(".list_result").html('');
			for(var i=0;i<data.length;i++){
				var content_item = "<div class='li_tag'>"
					+"<div class='thumbnails_item'>"+ss+"</div>"
					+"<div class='info_item'>"
						+"<div class='title_item'>"+ss+"</div>"
						+"<div class='cost_item'>"+ss+"</div>"
						+"<div class='timePost_item'>"+ss+"</div>"
						+"<div class='button_item'>"+ss+"</div>"
					+"</div>"
				+"</div>";
				//$(".list_result").append("<div class='li_tag'>"+data[i].title+"</div>");
				$(".list_result").append(content_item);
			}
		}		
	});
}

$( document ).ready(function() {
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));

    $("#searchKey").keypress(function(e) {
    	if(e.which == 13) {
        	doGoClick();
    	}
	});
});

$(window).resize(function(){
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));  
});
