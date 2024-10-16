<?php
//THEME SUPPORTS
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
});


//THEME EXTRAS
// require_once get_template_directory() . '/inc/post-types.php';
//require_once get_template_directory() . '/inc/spa.php';
//require_once get_template_directory() . '/inc/ajax.php';



require_once get_template_directory() . '/inc/theme-image.php';

include 'inc/settings.php';
include 'inc/customizer-theme-settings.php';
include 'inc/assets.php';
include 'inc/post-functions.php';
include 'inc/navigation.php';
include 'inc/ajax.php';

//THEME MENUS
register_nav_menus(array(
	'primary_left' => __('Primary Menu'),
));


function allow_svg_upload($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

//THEME STYLES & SCRIPTS



//ENABLING - DISABLING GUTENBERG FOR CERTAIN POST TYPES
// add_filter('use_block_editor_for_post_type', 'theme_gutenberg_support_for_post_types', 10, 2);

// function theme_gutenberg_support_for_post_types($use_block_editor, $post_type)
// {
// 	if ($post_type == 'post') {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }

function add_paragraph_tags_to_acf_wysiwyg_content($value, $post_id, $field)
{
	if ($field['type'] === 'wysiwyg') {
		$blocks = preg_split('/\n\s*\n/', $value);
		$blocks = array_filter($blocks);
		$formatted_content = '';
		foreach ($blocks as $block) {
			if (!preg_match('/^<p>/', $block)) {
				$formatted_content .= '<p>' . $block . '</p>';
			} else {
				$formatted_content .= $block;
			}
		}
		return $formatted_content;
	}

	return $value;
}
add_filter('acf/format_value', 'add_paragraph_tags_to_acf_wysiwyg_content', 10, 3);




// =========

