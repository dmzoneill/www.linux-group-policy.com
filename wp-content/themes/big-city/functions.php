<?php
define('HEADER_IMAGE_WIDTH', '900');
define('HEADER_IMAGE_HEIGHT', '138');
define('HEADER_TEXTCOLOR', 'ffffff');
$content_width = "600";
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
register_sidebar(array('name'=>'Widgets', 
	'description'=>'Widgets in this area will be shown on the right-hand side.', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget'=>'<div class="box">', 
	'after_widget'=>'</div>'));

register_nav_menu('main', 'Main navigation menu');

add_custom_background();

if (!function_exists('bigcity_header_style')) {
    function bigcity_header_style() {
        if (get_header_image ()) {
            ?><style type="text/css">
                #header {
                    background: url(<?php header_image(); ?>) no-repeat;
                }
            </style><?php
        }
    }
}

if (!function_exists('bigcity_admin_header_style')) {
    function bigcity_admin_header_style() {
        ?><style type="text/css">
            #header {
                width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            }
        </style><?php
    }
}
add_custom_image_header('bigcity_header_style', 'bigcity_admin_header_style');
