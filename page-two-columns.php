<?php /* Template Name: Two Columns */ ?>

<?php get_header(); ?>

	<div id="main" class="container flex flex-column">
		<h2><?php echo the_title(); ?></h2>
		<div class="container">
			<?php the_post(); ?>

		   	
			
			<div class="cols flex flex-j-between flex-a-start">
				<div class="main">
					<?php echo the_content(); ?>
				</div>
				<div class="main">
					<?=types_render_field('column-2', ['output' => 'html']); ?>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>