$(document).ready(function(){


	// Setup AJAX ...
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});



	// Switch Active Link ...
	$('.nav-item .nav-link').click(function(){
		$(this).addClass('active');
		$(this).parent().siblings().find('.nav-link').removeClass('active');
	});


	// Navbar Active ..
	$(window).scroll(function(){
		if( $(this).scrollTop() >= 520 ){
			$('.navbar-laravel').css('background-color','rgba(0,0,0,.8)')
		}else{
			$('.navbar-laravel').css('background-color','#333')
		}
	});



});