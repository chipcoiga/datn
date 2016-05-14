function sendMessage(){
	var msg = $('#sendMessage').val();
	var userChatWith = $('#userChatWith').val();
	$.post("sendMessage",{
		msg:msg,
		userChatWith:userChatWith
	},
	function(data){

	})
}
$(document).ready(function(){
	$,post("getPreviousMsg",function(data){
		for(var i=0;i<data.length;i++){
			
		}
	});
});