<?php /* Template Name: Page display Services */ 

	get_header(); ?>
?>

<div id="main" class="container-grey">
	<div class="container flex flex-column">
		<?php the_post(); ?>

		<h2 class="treatment-title"><?php echo the_title(); ?></h2>
		<div class="back-to flex flex-start">
			<a href="<?php echo home_url('treatments') ?>" data-icon="&#xe12e;"  id="back-arrow" class="back">Back to treatments</a>
		</div>

		<div class="banner">
			<?php echo types_render_field('service-image', ['url' => false]); ?>
		</div>

	<div class="container flex flex-column">	
		<div class="flex flex-row">
			<?php
				$args = [
					'post_type' => 'service',
					'order'     => 'DESC',
					'orderby'   => 'menu_order',
					'showposts' => -1,
					'category_name' => types_render_field('service-treatment', ['output' => 'normal'])
				];

			?>

			<div class="container services-content flex flex-column">
				<div class="book-link"><a href="<?php echo home_url('book-online') ?>">Book Now</a>
				</div>
				<?php echo the_content(); ?>



				<?php query_posts($args); if(have_posts()): while(have_posts()): the_post(); ?>

						<h3><? the_title() ?></h3>

				
						<?php echo types_render_field('description', ['output' => 'html']); ?>
				
					<?php endwhile; endif; ?>
		

			</div>
		</div>
	</div>
</div>
<?php wp_reset_query(); ?>
		

<?php get_footer(); ?>