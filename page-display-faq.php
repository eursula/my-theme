<?php /* Template Name: Page with FAQs */ ?>

<?php get_header(); ?>

<div class="container flex flex-column">
	<h2 class="title"><?php echo the_title(); ?></h2>
	<div class="flex flex-row">
		<?php
			$args = [
				'post_type' => 'faq',
				'order'     => 'ASC',
				'orderby'   => 'menu_order',
				'showposts' => -1
			];

			query_posts($args);
		?>
		<?php if(have_posts()): ?>

		<?php while(have_posts()): ?>

		<?php the_post(); ?>


	

		<div id="verticalTab">

					<?php echo types_render_field('question', ['output' => 'html']); ?>
		</div>
		<div class="resp-tabs-container">
			
				<?php echo types_render_field('answer', ['output' => 'html']); ?>	
		
		</div>

	<?php endwhile; ?>
	<?php endif; ?>

	</div>
<?php wp_reset_query(); ?>


<?php get_footer(); ?>