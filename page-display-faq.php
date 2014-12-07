<?php /* Template Name: Page with FAQs */ ?>

<?php get_header(); ?>

<div id="main" class="container-grey">
	<div class="container flex flex-column">
		<h2 class="title"><?php echo the_title(); ?></h2>
		<div class="flex flex-row">
			<?php
				$args = [
					'post_type' => 'faq',
					'order'     => 'DESC',
					'orderby'   => 'menu_order',
					'showposts' => -1
				];
			?>
			

			<div class="verticalTab">
				<ul class="resp-tabs-list">
					<?php query_posts($args); if(have_posts()): while(have_posts()): the_post(); ?>
					<li>
						<?php echo types_render_field('question', ['output' => 'html']); ?>
					</li>
					<?php endwhile; endif; ?>
				</ul>
						
				<div class="resp-tabs-container">
					<?php query_posts($args); if(have_posts()): while(have_posts()): the_post(); ?>
					<div>
						<?php echo types_render_field('answer', ['output' => 'html']); ?>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_query(); ?>


<?php get_footer(); ?>