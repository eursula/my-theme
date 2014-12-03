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
	  'header-user-menu' => __( 'Header User Menu' ),
	  'logged-in-user' => __( 'Logged In User' )
	)
  );
}

add_action( 'init', 'register_my_menus' );

//add_action('header_menu', 'register_my_custom_submenu_page');

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



	# Appointments Plus redirect
	function add_appointments_css_style() {
		if ( !class_exists( 'Appointments' ) )
			return;
		// You may add additional conditions here, e.g. load styles only for a certain page
		global $appointments;

		$appointments->load_scripts_styles( );
	}
	add_action( 'template_redirect', 'add_appointments_css_style' );


	# Login function
	function beauty_login_init () {
		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';

		if ( isset( $_POST['wp-submit'] ) ) {
			$action = 'post-data';
		} else if ( isset( $_GET['reauth'] ) ) {
			$action = 'reauth';
		} else if ( isset($_GET['key']) ) {
			$action = 'resetpass-key';
		}

		# redirect to change password form
		if ( $action == 'rp' || $action == 'resetpass' ) {
			wp_redirect( home_url('/login/?action=resetpass') );
			exit;
		}

		// redirect from wrong key when resetting password
		if ( $action == 'lostpassword' && isset($_GET['error']) && ( $_GET['error'] == 'expiredkey' || $_GET['error'] == 'invalidkey' ) ) {
			wp_redirect( home_url( '/login/?action=forgot&failed=wrongkey' ) );
			exit;
		}

		if (
			$action == 'post-data'		||			// don't mess with POST requests
			$action == 'reauth'		   ||			// need to reauthorize
			$action == 'resetpass-key'	||			// password recovery
			$action == 'logout'						 // user is logging out
		) {
			return;
		}

		//wp_redirect( home_url( '/login/' ) );
		//exit;
	}
	add_action('login_init', 'beauty_login_init');

	function beauty_template_redirect () {
		if ( is_page( 'login' ) && is_user_logged_in() ) {
			wp_redirect( home_url( '/user/' ) );
			exit();
		}

		if ( is_page( 'user' ) && !is_user_logged_in() ) {
			wp_redirect( home_url( '/sign-in/' ) );
			exit();
		}
		if ( is_page( 'book-online' ) && !is_user_logged_in() ) {
			wp_redirect( home_url( '/sign-in/' ) );
			exit();
		}
	}
	add_action( 'template_redirect', 'beauty_template_redirect' );


	/* User Page */
	global $current_user;
	get_currentuserinfo();

	require_once( ABSPATH . WPINC . '/registration.php' );

	if ( !empty($_POST) && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

		/* Update user password */
		if ( !empty($_POST['current_pass']) && !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {

			if ( !wp_check_password( $_POST['current_pass'], $current_user->user_pass, $current_user->ID) ) {
				$error = 'Your current password does not match. Please retry.';
			} elseif ( $_POST['pass1'] != $_POST['pass2'] ) {
				$error = 'The passwords do not match. Please retry.';
			} elseif ( strlen($_POST['pass1']) < 4 ) {
				$error = 'Password too short';
			} elseif ( false !== strpos( wp_unslash($_POST['pass1']), "\\" ) ) {
				$error = 'Password may not contain the character "\\" (backslash).';
			} else {
				$error = wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );

				if ( !is_int($error) ) {
					$error = 'An error occurred while updating your profile. Please retry.';
				} else {
					$error = false;
				}
			}

			if ( empty($error) ) {
				do_action('edit_user_profile_update', $current_user->ID);
				wp_redirect( site_url('/user/') . '?success=1' );
				exit;
			}
		}
	}

	# http://wordpress.stackexchange.com/questions/2143/customizing-only-a-specific-menu-using-the-wp-nav-menu-items-hook
	add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2);

	function my_custom_menu_item($items, $args) {

		// quit this function early and don't change anything if this function is not running on the menu we want
		if($args->theme_location == 'header-user-menu' || $args->theme_location == 'logged-in-user'){
			if(is_user_logged_in()) {
			 
			    $user = wp_get_current_user();

			    $name = $user->user_firstname; // or user_login , user_firstname, user_lastname
			    $items .= '<li style="color: white; padding-left: 10px;">Welcome, '.$name.'</li>';
			}
		}

		return $items;

	}
}


