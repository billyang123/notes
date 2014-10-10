$(document).ready ->
	$(window)
		.scroll ->
	    	if $(window).scrollTop()>200
	            $("#goToTop,#goToBottom").fadeIn(300);
	    	else
	            $("#goToTop,#goToBottom").fadeOut(200);
