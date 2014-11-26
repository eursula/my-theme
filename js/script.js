jQuery(function(){

	var $ = jQuery;

		$('.open1').on('click', function(){
			$('body').toggleClass('show_sidemenu')
		})

		$('#open2').on('click', function(){
			$('body').toggleClass('show_topmenu')
		})

		$('.open3').on('click', function(){
			$('body').toggleClass('show_usermenu')
		})


        $('.verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });

        $(document).ready(function() {
            $(".show").fancybox({
                'titleShow'     : 'false',
                'transitionIn'      : 'fade',
                'transitionOut'     : 'fade'
            });
        });
});

/*$(".open").click(function(e) {

        if( $(this).hasClass("open") ) {
            $(this).removeClass("open").addClass("closed");
        } else {
            // if other menus are open remove open class and add closed
            $(this).siblings().removeClass("open").addClass("closed"); 
            $(this).removeClass("closed").addClass("open");
        }

});*/

