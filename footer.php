	
	<footer>
		<div class="mobile">
			<div class="footer-pic"></div>
			<div class="logo"><p>B</p></div>
			<div class="footer-pic"></div>
		</div>
		<div class="desktop container">
			<div class="left-box">	
				<div id="mc_embed_signup"><!-- Begin MailChimp Signup Form -->
					<form action="//yoobee.us9.list-manage.com/subscribe/post?u=c7e238c3a2dd9e3f0405aa7e8&amp;id=43f24f746b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
							<h2>Subscribe to our mailing list</h2>
							<div class="indicates-required">
								<span class="asterisk">*</span> indicates required
							</div>
							<div class="mc-field-group">
								<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
								</label>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
							</div>
							<div class="mc-field-group">
								<label for="mce-FNAME">First Name </label>
								<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    	<div style="position: absolute; left: -5000px;">
					    		<input type="text" name="b_c7e238c3a2dd9e3f0405aa7e8_43f24f746b" tabindex="-1" value="">
					    	</div>
					    	<div class="clear">
					    		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					    	</div>
					    </div>
					</form>
					<div class="phone flex flex-row flex-j-center">
						<span data-icon="&#xe03c;"></span>
						<p>09 233 2347</p>
					</div>
				</div><!--End mc_embed_signup-->
			</div>
			<div class="right-box">
				<div class="social-icons flex flex-row flex-j-center">
					<a href="http://www.facebook.com"><span data-icon="&#xe167"></span></a>
					<a href="http://www.google.com"><span data-icon="&#xe16b"></span></a>
					<a href="http://www.twitter.com"><span data-icon="&#xe16f"></span></a>
					<a href="http://www.pinterest.com"><span data-icon="&#xe1a6"></span></a>
				</div>
				<?php if(is_user_logged_in()): ?>
					<?php wp_nav_menu( array( 'theme_location' => 'logged-in-pages' ) ); ?>
				<?php else: ?>
					<?php wp_nav_menu( array( 'theme_location' => 'logged-out-pages' ) ); ?>
				<?php endif; ?>
			</div>
		</div>
		
		<div class="copy flex flex-row flex-j-center flex-j-space">
			<p>&copy; Beauty Boutique 2014</p>
			<span data-icon="&#xe00a;"></span>
			<p>Website Design by Eursula Hicks</p>
		</div>
	</footer>
	</div><!-- end of .pusher -->
	

	<?php wp_footer(); ?>
</body>
</html>