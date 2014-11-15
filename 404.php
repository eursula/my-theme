<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Beauty_Boutique
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div class="container">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
					<h1 class="page-title"><?php _e( 'Not Found', 'Beauty_Boutique' ); ?></h1>


				<div class="page-wrapper">
					<div class="page-content">
						<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'Beauty_Boutique' ); ?></h2>
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'Beauty_Boutique' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</div><!-- .page-wrapper -->

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>