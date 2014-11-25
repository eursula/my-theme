<?php /* Template Name: Two Columns */ ?>

<?php get_header(); ?>

	<div class="container flex flex-column">
		<?php the_post(); ?>

	   	<h2><?php echo the_title(); ?></h2>
		
		<div class="cols flex flex-j-between flex-a-start">
			<div class="main">
				<?php echo the_content(); ?>
			</div>
			<div class="main">
				<?=types_render_field('column-2', ['output' => 'html']); ?>
			</div>
		</div>
	</div>


<?php get_footer(); ?>