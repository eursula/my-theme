<?php /* Template Name: Header */ ?>

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
			<div class="container" id="b-menu">
				<div class="main-menu">
					<?php wp_nav_menu('header-menu'); ?>
				</div>
				<div data-icon="&#xe1cf;"  id="icon-hamburger" class="open1"></div>
				<a href="#">
					<div class="icon-button" class="open2"></div>
				</a>
				<div data-icon="&#xe070;"  id="icon-user" class="open3"></div>
			</div>
		</header>

