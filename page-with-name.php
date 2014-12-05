<?php /* Template Name: Page with Name */ ?>

<?php get_header(); ?>
<div class="face-pic">
			<img src="wp-content/themes/my-theme/css/img/beauty-large.png" alt="">
		</div>
<div class="container flex flex-row flex-a-center">
	<div class="title">
		<h1 id="name1">BEAUTY</h1>
		<h1 id="name2">BOUTIQUE</h1>
		<div class="main-pic">
			<div id="x-pic"></div>
		</div>
		
	</div>
	
	<div class="promotion-box">
		<?php echo types_render_field('promotion_icon', ['output' => 'html']); ?>

		<?php echo types_render_field('promotion_box', ['output' => 'html']); ?>
	</div>

<?php get_footer(); ?>