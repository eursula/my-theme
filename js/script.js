jQuery(function(){

	var $ = jQuery;

		$('.open1').on('click', function(){
			$('body')
				.removeClass('show_topmenu')
				.removeClass('show_usermenu')
				.toggleClass('show_sidemenu')
		})

		$('#open2').on('click', function(){
			$('body')
				.removeClass('show_sidemenu')
				.removeClass('show_usermenu')
				.toggleClass('show_topmenu')
		})

		$('.open3').on('click', function(){
			$('body')
				.removeClass('show_sidemenu')
				.removeClass('show_topmenu')
				.toggleClass('show_usermenu')
		})

    });

	$('.verticalTab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto',
		fit: true
	});

	$(document).ready(function() {
		$(".show").fancybox({
			'titleShow'	 : 'false',
			'transitionIn'	  : 'fade',
			'transitionOut'	 : 'fade'
		});
	


	(function($) {
		window.fnames = new Array(); 
		window.ftypes = new Array();
		fnames[0]='EMAIL';
		ftypes[0]='email';
		fnames[1]='FNAME';
		ftypes[1]='text';
	}(jQuery));

	var $mcj = jQuery.noConflict(true);

});





