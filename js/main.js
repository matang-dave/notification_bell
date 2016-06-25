
var isNotification = false;
var AJAX_REQUEST_TIMER = 5000;
var isClickable = false;
var notificationContent = '<div class="arrow-up"></div><div class="nContainer">'+
'<span> Notifications </span>'+ 
'<div class="badge2">0</div></div><div class="msg">'+
		'</div>';
$(document).ready(function(){
	$("#bell").click(showNotification);
	$('body').click(hideNotification);
	//setTimeout(getNotification,);


	window.setInterval(function(){
		getNotification()
	}, AJAX_REQUEST_TIMER);


	
	
});

function setNotificationCount(data) {
	data = JSON.parse(data);
	if(data['count']==0) {
		$('.badge').css("visibility", 'hidden');
		isClickable = false;
	}
	else {
		$('.badge').css("visibility", 'visible');
		if(data['count']>9) {
			$('.badge').html('9+');
			$('.badge2').html('9+');
		}
		else {
			$('.badge').html(data['count']);
			$('.badge2').html(data['count']);
		}
		isClickable = true;
	}
}

function appendNotifications(data) {
	
	data = JSON.parse(data);
	var i;
	for(i=0;i<data['notifications'].length;i++) {
		var html = "<div class='nMessage'>"+
		 		"<span>"+data['notifications'][i]+"</span>"+ 
		 "</div>";
		
		$('.msg').append(html);
	}
}

function getNotification() {
	
	if(!isNotification) {
		var requestUrl = 'index.php/notification/counts';
		var callback = setNotificationCount;
	}
	else {
		var requestUrl = 'index.php/notification/notifications';
		var callback = appendNotifications;
	}
	
	$.ajax({
		  type: "POST",
		  url: requestUrl,
		  success:callback,
		  async:false,
	});
	
}

function hideNotification() {
	$(".notification").hide();
	isNotification = false;
	$('.notification').html(notificationContent);
}
function showNotification() {
	
	if(!isClickable)
		return false;
	
	$('.badge').css("visibility", 'hidden');
	isClickable = false;
	
	
	var notification = $(".notification");
	if(!isNotification) {
		
		var requestUrl = 'index.php/notification/notifications';
		var callback = appendNotifications;
		
		$.ajax({
			  type: "POST",
			  url: requestUrl,
			  success:callback,
			  async : false
		});
		
		var position = $(this).position();
		
		var width = notification.width();
		var left1 = position.left - width/2 + $(this).width()/2 ;
		var top1 =  position.top + 50 ;
		$(".notification").css({top: top1, left: left1}).slideDown( "slow" );
		$(".arrow-up").slideDown( "slow" );
		notification.slideDown( "slow" );
		isNotification = true;
	}
	else {
		notification.hide();
		$(".arrow-up").hide();
		isNotification = false;
		$('.notification').html(notificationContent);
	}
	return false;
}