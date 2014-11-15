<?php get_header(); ?>

	<div class="container">
		<?php the_post(); ?>

	   <h2><?php echo the_title(); ?></h2>

	   <?php echo the_content(); ?>
	</div>

<?php get_footer(); ?>