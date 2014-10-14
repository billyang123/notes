$(document).ready ->
	$(window)
		.scroll ->
	    	if $(window).scrollTop()>200
	            $("#goToTop,#goToBottom").fadeIn(300)
	    	else
	            $("#goToTop,#goToBottom").fadeOut(200)

	winH = do $(window).height
	bodyH = do $('body').height
	if winH>bodyH
		mainht = winH - 135 - $('.notes-main').offset().top
		$(".notes-main").css "height",mainht+'px'
