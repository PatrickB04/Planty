<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/custom-style.css', array(), filemtime(get_stylesheet_directory() . '/custom-style.css'));
}

function masquer_element_admin_non_connecte($items, $args) {
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in()) {
            $items .= '<li><a href="#">admin</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'masquer_element_admin_non_connecte', 10, 2);

?>