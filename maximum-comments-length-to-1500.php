<?php

/*
Plugin Name: Maximum comment length to 1500
Version: 1.0
Author: rentrating.net
Author URI: https://rentrating.net
Description: If you are using standard wordpress comments system, this plugin can limit the maximum length of the comments to 1500 characters.
License: GPL2
*/

add_action( 'wp_footer', 'rentrating_footer_scripts' );
function rentrating_footer_scripts(){
  ?>
<script type="text/javascript">
jQuery(function($) {
	var comment_input = $( '#commentform textarea' );
	var submit_button = $( '#commentform .form-submit' );
	var comment_limit_chars = 1500;

	$( '<div class="comment_limit"><span>' + comment_limit_chars + '</span> characters available</div>' ).insertAfter( comment_input );
	
	comment_input.bind( 'keyup', function() {
		var comment_length = $(this).val().length;
		var chars_left = comment_limit_chars - comment_length;
		
		$( '.comment_limit span' ).html( chars_left );
		
		if (submit_button)
			( chars_left < 0 ) ? submit_button.hide() : submit_button.show();
	});
});
</script>
  <?php
}
