<?php /* Template Name: Logout Page */

  	get_header(); ?>
	
	<div class="container logout">

		<?php wp_logout_url('index.php'); ?>

	</div>


  	<?php get_footer(); ?>