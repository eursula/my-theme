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
	  'logged-in-user' => __( 'Logged In User' ),
	  'logged-in-pages' => __( 'Logged In Pages' ),
	  'logged-out-pages' => __( 'Logged Out Pages' )
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

	# MailChimp newletter sign up
	wp_register_script('mailChimp', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js',
		false,
		false,
		true
	);

	wp_enqueue_script('mailChimp');

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
	

	# Slider Script
	//wp_register_script('jssor', $dir.'/js/jssor.js', ['jquery'], false, true);

	//wp_register_script('slider-script', $dir.'/js/jssor.slider.js', ['jquery', 'jssor'], false, true);

	//wp_enqueue_script('slider-script');

	# Theme script
	wp_register_script('theme', $dir.'/js/script.js',
		false,
		false,
		true
	);

	wp_enqueue_script('theme');

	# Bootstrap
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');

	# Bootstrap Slider theme
	wp_enqueue_style('slider-theme', $dir.'/css/full-slider.css');

	# Mail chimp
	wp_enqueue_style('mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-081711.css');

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
			wp_redirect( home_url( '/user/' )  );
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
				wp_redirect( home_url('/user/') . '?success=1' );
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

	function app_redirect( $script ){ 
	    return str_replace("window.location.href=app_location()", "window.location.href='http://eursula.hicks.yoobee.net.nz/beauty_boutique'", $script); 
	} 
	add_filter( 'app_footer_scripts', 'app_redirect' );


	# Change logo and styles for login page when errors occur
	function my_login_logo() { ?>
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/css/img/pink-letter-logo.png);
	            padding-bottom: 30px;
	        }
	    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	function my_login_logo_url() {
	    return home_url();
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );

	function my_login_logo_url_title() {
	    return 'Beauty Boutique';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

	
	# https://wordpress.org/support/topic/can-you-stop-wp_login_form-redirecting-to-wp-login-on-fail
	add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

	function my_front_end_login_fail( $username ) {
		$referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
		// if there's a valid referrer, and it's not the default log-in screen
		if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
			if(!strstr($referrer, '?login=failed')){
				wp_redirect( $referrer . '?login=failed' );
			}else{
				wp_redirect( $referrer );  // let's append some information (login=failed) to the URL for the theme to use
			}
			
			exit;
		}
	}


	# http://wordpress.stackexchange.com/questions/28786/action-wp-login-failed-not-working-if-only-one-field-is-filled-out
	add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3);
	function custom_authenticate_username_password( $user, $username, $password ){
		if ( is_a($user, 'WP_User') ) { return $user; }

		if ( empty($username) || empty($password) ){
			$error = new WP_Error();
			$user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));

			return $error;
		}
	}

}else{

	add_action( 'admin_init', 'redirect_non_admin_users' );
	/**
	 * Redirect non-admin users to home page
	 *
	 * This function is attached to the 'admin_init' action hook.
	 */
	function redirect_non_admin_users() {
		if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
			wp_redirect( home_url() );
			exit;
		}
	}
}

