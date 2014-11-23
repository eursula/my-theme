<?php /* Template Name: Page with Banner */ ?>

<?php get_header(); 
?>
<div class="container flex flex-column">
	<?php the_post(); ?>

	<h2 class="treatment-title"><?php echo the_title(); ?></h2>

	<div class="banner">
		<?php echo types_render_field('banner-image', ['url' => false]); ?>
	</div>
	
	<?php echo the_content(); ?>

<?php get_footer(); ?>