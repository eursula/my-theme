<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body>

	<div class="pusher">
		<div id="sidemenu">
			<?php wp_nav_menu( array( 'theme_location' => 'side-menu' ) ); ?>
		</div>
		
		<div id="topmenu">
			<p>Welcome to Beauty Boutique</p>
			<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
		</div>

		<div id="usermenu">
			<p>Log in or register with us</p>
			<?php wp_nav_menu( array( 'theme_location' => 'user-menu' ) ); ?>
		</div>

		<header>
			<div class="container flex flex-j-between" id="b-menu">
				<div class="main-menu">
					<?php wp_nav_menu('header-menu'); ?>
				</div>
				<div class="login-menu">
					<a href="index.php/sign-in" id="left">Sign In</a>
					<div id="registration">
						<a class="show register-button" href="#register-form">Sign Up</a>
					</div>
				</div>
				<a href="<?php echo home_url() ?>" class="header-logo">
					<h1 id="logo1">BEAUTY</h1>
					<h1 id="logo2">BOUTIQUE</h1>
					<div class="main-pic">
						<div id="x-logopic"></div>
					</div>	
				</a>
				<div data-icon="&#xe0b8;"  id="icon-hamburger" class="open1"></div>
				<a href="#">
					<div class="icon-button" id="open2"></div>
				</a>
				<div data-icon="&#xe070;"  id="icon-user" class="open3"></div>
			</div>
		</header>

