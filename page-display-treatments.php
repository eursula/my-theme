<?php /* Template Name: Page display Treatments */ 

	get_header(); ?>
?>
<div id="main">
	<div class="container flex flex-column">	
		<h2 class="page-title"><?php echo the_title(); ?></h2>
		<div class="flex flex-row">
			<?php
				$args = [
					'post_type' => 'treatment',
					'order'     => 'DESC',
					'orderby'   => 'menu_order',
					'showposts' => -1
				];


				query_posts($args);
			?>
			<?php if(have_posts()): ?>

			<?php while(have_posts()): ?>

			<?php the_post(); ?>

			<div class="treatments flex flex-j-center">
				<a href="<?=types_render_field('url', ['output' => 'raw'])?>" id="image-w">
					<div class="tr-name flex flex-j-center flex-a-center">
						<h2><? the_title() ?></h2>
					</div>
					<div class="tr-image grow">
						<?=types_render_field('treatment-image', ['url' => false]); ?>
					</div>
				</a>
			</div>
		

		<?php endwhile; ?>
		<?php endif; ?>

	</div>
</div>
<?php wp_reset_query(); ?>
		

<?php get_footer(); ?>

