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
	</div>

<?php get_footer() ?>