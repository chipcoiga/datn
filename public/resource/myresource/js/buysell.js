$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var listPoint =[];
function doGoClick(){
	var searchKey = $("#searchKey").val();
	var searchCity = $("#searchCity").val();
	var searchType = $("#searchType").val();
	getProductAjax(searchKey,searchCity,searchType);
}



function getProductAjax(searchKey,searchCity,searchType){
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
			listPoint =[];
			for(var i=0;i<data.length;i++){
				var content_item = "<div class='li_tag'>"
					+"<div class='thumbnails_item' onclick='doViewMaps("+data[i].id+");'>"+data[i].title+"</div>"
					+"<div class='info_item'>"
						+"<div class='content_item' onclick='doViewMaps("+data[i].id+");'>"
							+"<div class='title_item'>"+data[i].title+"</div>"
							+"<div class='cost_item'>"+data[i].cost+"</div>"
							+"<div class='timePost_item'>"+data[i].created_at+"</div>"
						+"</div>"
						+"<div class='button_item'><a href='viewDetail?id="+data[i].id+"'><button>Chi tiết</button></a></div>"
					+"</div>"
				+"</div>";
				$(".list_result").append(content_item);
				listPoint.push({'latitude': data[i].latitude, 'longitude': data[i].longitude,'title':data[i].title, 'id':data[i].id});
			}			
		}		
	});
}

function doViewMaps(id) {
	clearAll();
	showMarker(id,listPoint);
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

	getProductAjax("",1,1);
});

$(window).resize(function(){
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));  
});
