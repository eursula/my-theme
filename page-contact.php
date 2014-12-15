<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

	<div id="main">
		<div id="contact">
			<div class="container flex flex-column">
				<?php if ( have_posts()) :
			   while ( have_posts()) : the_post(); ?>

			   <h2><?php echo the_title(); ?></h2>
				
				<div class="cols flex flex-j-between flex-a-start">
					<div>
			   			<?php echo the_content(); ?>
					</div>
					<div>
			   			<?=types_render_field('column-2', ['output' => 'html']); ?>
					</div>
				<?php endwhile; else: ?>
					<p>No Posts</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="map">
			<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3195.255789037202!2d174.77246870000005!3d-36.78841709999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snz!4v1417834591136" width="100%" height="400" frameborder="0"></iframe>
		</div>
	</div>

<?php get_footer() ?>