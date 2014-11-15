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
	
	<header>
		<div class="container">
			<div id="topmenu">
				<p>Welcome to Beauty Boutique</p>
				<?php wp_nav_menu(); ?>
			</div>
			<a href="#">
				<div class="icon-button" id="open"></div>
			</a>
			<div data-icon="&#xe070;"  id="icon-user"></div>	
		</div>
	</header>
