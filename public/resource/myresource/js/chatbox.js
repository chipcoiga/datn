var socket=io.connect('http://localhost:5000');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var curentUser;
var dataImage = "data:image/png;base64,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";
function sendMessage(){
	var msgSend = $('#sendMessage').val();
	var sendTo = $('#userChatWith').val();
	var sendFrom = $('#currentUser').val();
	if(msgSend && sendTo && sendFrom){
		$.post("sendMessage",{
			msgSend:msgSend,
			userChatWithSend:sendTo,
			curentUserSend:sendFrom
		},
		function(data,status){
			var msg =[msgSend, sendTo, sendFrom];
			$('#sendMessage').val('');
			socket.emit('newMSG',msg);
		});
	}
	else{
		return;
	}	
}

socket.on('showMsg', function(msg){
    //console.log('receiver from'+msg);
    $('#contentMsg').append(showMessageReceiver(msg[0],msg[1],msg[2]));
});

var height = 0;


$(document).ready(function(){
	$.post("getListUserChat",function(data){
		for(var i=0;i<data.length;i++){
			$('#listUserChat').append(listUserChatItem(data[i].username,dataImage));
		}
		var _idgetter = $('#userChatWith').val();
		//console.log('_idgetter: ' +_idgetter);
		for(var i=0;i<data.length;i++){
			if((data[i].username == _idgetter) && _idgetter){

				//console.log('click');
				$('#'+data[i].username).trigger('click');
				break;
			}
		}
		console.log($('#contentMsg').height());
		$('#contentMsg').animate({scrollTop: 1000});
	});
});
function showConversation(username){
	$.post("showConversation",{
		username:username
	},function(data){
		$('#contentMsg').html('');
		curentUser = $('#currentUser').val();
		$('#userChatWith').val(username);
		$('#conversationName').text("Đang trò chuyện: "+username);
		for(var i=0;i<data.length;i++){
			$('#contentMsg').append(showMessage(data[i],dataImage,curentUser));
		}
		
	});
			
}
function listUserChatItem(data,img){
	var temp = '<div class="media conversation" onclick="showConversation(\''+data+'\');" id="'+data+'">'
		+"<a class='pull-left' href='#'>"
			+"<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 50px; height: 50px;' src='"+img+"'/>"
		+"</a>"
		+"<div class='media-body'>"
    		+"<h5 class='media-heading'>"+data+"</h5>"
    	+"</div>"
    +"</div>";
    return temp;
}

function showMessage(data, img, curentUser){
	var temp;
	if(data.fromUser == curentUser){
		temp = "<hr>"
        +"<a class='pull-right' href='#'>"
            +"<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 32px; height: 32px;' src='"+img+"'>"
        +"</a>"
        +"<div class='media-body'>"
            +"<h5 class='pull-right media-heading'>"+data.fromUser+"</h5>"
            +"<small class='col-xs-offset-3 col-xs-9' style='float:right;'>"+data.msg+"</small>"
        +"</div>";
	}else{
		temp = "<hr>"
        +"<a class='pull-left' href='#'>"
            +"<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 32px; height: 32px;' src='"+img+"'>"
        +"</a>"
        +"<div class='media-body'>"
            +"<h5 class='media-heading'>"+data.fromUser+"</h5>"
            +"<small class='col-md-9'>"+data.msg+"</small>"
        +"</div>";
	}	
	//$('#contentMsg').animate({scrollTop: 1000});
    return temp;
}

function showMessageReceiver(msg,sendto, sendfrom)
{
	var temp;
	if(sendfrom == curentUser){
		temp = "<hr>"
        +"<a class='pull-right' href='#'>"
            +"<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 32px; height: 32px;' src='"+dataImage+"'>"
        +"</a>"
        +"<div class='media-body'>"
            +"<h5 class='pull-right media-heading'>"+sendfrom+"</h5>"
            +"<small class='col-xs-offset-3 col-xs-9' style='float:right;'>"+msg+"</small>"
        +"</div>";
	}
	if(sendto == curentUser){
		//console.log('show msg receiver from: '+sendfrom+' but current: '+curentUser);
		temp = "<hr>"
	        +"<a class='pull-left' href='#'>"
	            +"<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 32px; height: 32px;' src='"+dataImage+"'>"
	        +"</a>"
	        +"<div class='media-body'>"
	            +"<h5 class='media-heading'>"+sendfrom+"</h5>"
	            +"<small class='col-md-9'>"+msg+"</small>"
	        +"</div>";	
	}

    return temp;
}

