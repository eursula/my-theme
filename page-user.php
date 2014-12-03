<?php /* Template Name: Page display User */ 

	get_header(); ?>
?>

<div class="container">
	

	<form method="post" action="/user/">
    <p>
        <label for="current_pass">Current Password</label>
        <input class="text-input" name="current_pass" type="password">
    </p>

    <p>
        <label for="pass1">New Password</label>
        <input class="text-input" name="pass1" type="password">
    </p>

    <p>
        <label for="pass2">Confirm Password</label>
        <input class="text-input" name="pass2" type="password">
    </p>

	<?php

	// extra fields
	do_action('edit_user_profile', $current_user);

	?>
	    <p class="form-submit">
	        <input name="updateuser" type="submit" value="Update profile">
	        <input name="action" type="hidden" value="update-user">
	    </p>
	</form>
</div>

<?php get_footer(); ?>