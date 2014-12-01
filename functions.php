<?php

# Template Directory
$dir = get_template_directory_uri();


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Main nav bar' ),
      'top-menu' => __( 'Top Menu' ),
      'side-menu' => __( 'Side Menu' ),
      'user-menu' => __( 'User Menu' ),
    )
  );
}

add_action( 'init', 'register_my_menus' );

add_action('header_menu', 'register_my_custom_submenu_page');

add_editor_style('editor-style.css');

if(!is_admin()){

	# jQuery
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
		false,
		false,
		true
	);

	# FancyBox JS
	wp_register_script('mousewheel', $dir.'/includes/fancybox/lib/jquery.mousewheel-3.0.6.pack.js', ['jquery'], false, true);

	wp_register_script('fancybox', $dir.'/includes/fancybox/source/jquery.fancybox.pack.js', ['jquery', 'mousewheel'], false, true);

	wp_enqueue_script('fancybox');

	wp_register_style('fancy-style', 
		$dir.'/includes/fancybox/source/jquery.fancybox.css',
		array(),
		'',
		'screen');

	wp_enqueue_style('fancy-style');


	# Tabs scripts
	wp_register_script('tabs', $dir.'/js/easyResponsiveTabs.js',
		false,
		false,
		true
	);

	wp_enqueue_script('tabs');
	

	# Theme script
	wp_register_script('theme', $dir.'/js/script.js',
		false,
		false,
		true
	);

	wp_enqueue_script('theme');

	# Bootstrap
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');

	# Tabs styles
	wp_enqueue_style('tabs-theme', $dir.'/css/easy-responsive-tabs.css');

	# Theme styles
	wp_enqueue_style('theme', $dir.'/css/style.css');

	function add_appointments_css_style() {
		if ( !class_exists( 'Appointments' ) )
			return;
		// You may add additional conditions here, e.g. load styles only for a certain page
		global $appointments;

		$appointments->load_scripts_styles( );
	}
	add_action( 'template_redirect', 'add_appointments_css_style' );

}


