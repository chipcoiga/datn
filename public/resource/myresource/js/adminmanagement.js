$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function load_data_func(data){
	$('.content_table').remove();
	$('#checker_header').prop( "checked", false );
	for(var i = 0; i< data.length; i++){
		var content = "<tr class='content_table' id='"+data[i].id+"'>"
		+"<td class='checker'><input type='checkbox' name='checker_box' value='"+data[i].id+"'></input></td>"
		+"<td><div class='col-lg-2 col-md-2 col-sm-12 col-xs-12 author'>"
		+"<div class='row'><span class='bold_title'>"+data[i].username+"</span></div>"
		+"<div class='row'><span>"+data[i].sdt+"</span></div></div>"
		+"<div class='col-lg-6 col-md-6 content'>"
		+"<span class='bold_title'>"+data[i].title+"</span>"
		+"<p>"+data[i].description+"</p></div>"
		+"<div class='col-lg-2 col-md-2 bold_title'>"+data[i].type+"</div>"
		+"<div class='col-lg-2 col-md-2  day_submit'>"+data[i].created_at+"</div></td></tr>";				
		$('#table_post').append(content);
	}
}

function load_byType(){
	var type_filter = $('#type_filter').val();
	$.post("load_byType",
		{
			type_filter: type_filter
		},
		function(data){
			load_data_func(data);
		});
}

function accept_action(){
	//get list checked
	var listchecked = [];
	$('input[name=checker_box]').each(function(){
		if($(this).is(':checked')){
			listchecked.push($(this).val());
		}
	});

	//get action
	var action_type = $('#type_filter').val();
	//commit to server
	$.post("doactionaccept",
	{
		listchecked: listchecked,
		action_type: action_type
	},function(data, status){
		for(var i =0; i< listchecked.length; i++){
			$('#'+listchecked[i]).remove();
		}
	});
}

function checker_header_checked(){
	if($('#checker_header').is(':checked')){
		$('input[name=checker_box]').prop( "checked", true );
	}else{
		$('input[name=checker_box]').prop( "checked", false );
	}
}

$(document).ready(function(){
	$.post('getListPostFirstTime',
		{},function(data,status){
			console.log(data,status);
			if(data){
				load_data_func(data);
			}
	});
});