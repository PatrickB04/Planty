<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/custom-style.css', array(), filemtime(get_stylesheet_directory() . '/custom-style.css'));
}

function remove_menu_item(){
	if (!is_user_logged_in()) {?>
	<script>
		 document.querySelectorAll('.wp-block-group .wp-block-navigation-item')[1].remove()
	</script>
<?php }
}
add_action('wp_footer', 'remove_menu_item');

?>