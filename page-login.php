<?php /* Template Name: Sign In Form */ 

	get_header(); ?>
	
	<div id="main">
		<div class="container-pic">
			<div class="container login-form flex flex-column">
				<?php if($_GET['login'] == 'failed'): ?>
					<p class="login-error">Username or Password incorrect</p>
				<?php endif; ?>
				<?php

				if ( ! is_user_logged_in() ) { // Display WordPress login form:

					$args = [
						'redirect' => home_url(),
						'form_id'  => 'loginform-custom',
						'label_username' => __( 'Username' ),
				        'label_password' => __( 'Password' ),
				        'label_remember' => __( 'Remember Me' ),
				        'label_log_in'   => __( 'Log In' ),
				        'remember' => true

					]
				?>
					<?php  wp_login_form( $args ); 
				}else{ // If logged in:
					wp_loginout( home_url() ); // Display "Log Out" link.
						echo " | ";
						wp_register('', ''); // Display "Site Admin" link.
				}
				?>
				
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
	


