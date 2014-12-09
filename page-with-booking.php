<?php /* Template Name: Booking Page */ ?>

<?php get_header(); ?>

	<div id="main" class="container-white">
		<div class="container booking flex flex-column">
			<h2><?php echo the_title(); ?></h2>

			<div id="booking-form" class="container flex flex-column">
				<?php if ( have_posts()) :
			   while ( have_posts()) : the_post(); ?>

			   	<?php echo the_content(); ?>
				
				<?php endwhile; else: ?>
					<p>No Posts</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer() ?>