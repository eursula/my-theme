<?php

# Template Directory
$dir = get_template_directory_uri();

register_nav_menu('main', 'Main nav bar');

//register_top_menu('top', 'Top nav bar');

add_editor_style('editor-style.css');

if(!is_admin()){

	# jQuery
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
		false,
		false,
		true
	);


	# Theme script
	/*wp_register_script('nav', $dir.'/js/script.js', 
		['jquery', 'slidesjs'],
		false, 
		true
	);*/

	wp_register_script('toggle-class', $dir.'/js/script.js',
		['jquery', 'toggleClass'],
		false,
		true
	);

	wp_enqueue_script('toggle-class');

	wp_register_script('theme', $dir.'/js/script.js',
		false,
		false,
		true
	);  

	wp_enqueue_script('theme');

	# Bootstrap
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');


	# Theme styles
	wp_enqueue_style('theme', $dir.'/css/style.css');

}