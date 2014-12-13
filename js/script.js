/*$(document).ready(function ($) {
            var options = {

                $AutoPlay: true,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $DragOrientation: 3                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        });*/

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





