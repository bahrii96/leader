<?php

function detect_assets()
{

	wp_deregister_script('jquery');

	if (!is_admin()) {
		/* Connect styles for Any Templates If needed */


		if (is_page_template('views/page-home.php')) {
			wp_enqueue_style('page-home', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-home.css', array(), null);
		}


		if (is_page_template('views/page-subscription.php')) {
			wp_enqueue_style('page-subscriptions', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-subscriptions.css', array(), null);
		}

		if (is_page_template('views/page-subscriptions.php' )) {
			wp_enqueue_style('page-subscriptions', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-subscriptions.css', array(), null);
		}
		if (is_page_template('views/page-contact.php' )) {
			wp_enqueue_style('page-contact', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-contact.css', array(), null);
		}
		if (is_page_template('views/page-our-courses.php' )) {
			wp_enqueue_style('page-our-courses', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-our-courses.css', array(), null);
		}
		if (is_page_template('views/page-individual-courses.php' )) {
			wp_enqueue_style('page-individual-courses', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-individual-courses.css', array(), null);
		}


		if (is_page_template('views/page-leadership.php')) {
			wp_enqueue_style('page-leadership', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-leadership.css', array(), null);
		}
		if (is_page_template('views/page-text.php')) {
			wp_enqueue_style('page-text', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-text.css', array(), null);
		}
		if (is_page() && !is_page_template()) {
			wp_enqueue_style('page-text', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-text.css', array(), null);
		}
		if (is_page_template('views/page-podcasts.php')) {
			wp_enqueue_style('page-podcasts', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-podcasts.css', array(), null);
			wp_enqueue_script('page-podcasts', get_stylesheet_directory_uri()
			. '/assets/js/page-podcasts.js', '', '', true);
		}
		if (is_page_template('views/page-videos.php')) {
			wp_enqueue_style('page-videos', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-videos.css', array(), null);
			wp_enqueue_script('page-videos', get_stylesheet_directory_uri()
			. '/assets/js/page-videos.js', '', '', true);
		}
		if (is_page_template('views/page-videos-collection.php')) {
			wp_enqueue_style('page-videos', get_stylesheet_directory_uri()
			. '/assets/css/pages/page-videos.css', array(), null);
			
		}
		if (is_page_template('views/page-news.php')) {
			wp_enqueue_style('page-news', get_stylesheet_directory_uri()
			. '/assets/css/pages/page-news.css', array(), null);
		}
		if (is_page_template('views/page-quiz.php')) {
			wp_enqueue_style('page-quiz', get_stylesheet_directory_uri()
			. '/assets/css/pages/page-quiz.css', array(), null);
			wp_enqueue_script('page-quiz', get_stylesheet_directory_uri()
			. '/assets/js/page-quiz.js', '', '', true);
		}


		/* Connect main style */

		if ('post' == get_post_type()) {
			wp_enqueue_style('blog-single-styles', get_stylesheet_directory_uri() . '/assets/css/pages/single-post.css', array(), '1.0');
			wp_enqueue_script('custom-ajax', get_stylesheet_directory_uri() . '/assets/js/ajax-script.js', array('jquery'), '1.0', true);
		}
		if ('sfwd-courses' == get_post_type()) {
		
			wp_enqueue_style('courses-archive-styles', get_stylesheet_directory_uri() . '/assets/css/pages/archive-courses.css', array(), '1.0');
			wp_enqueue_script('page-courses', get_stylesheet_directory_uri()
			. '/assets/js/page-courses.js', '', '', true);
	
		}


		wp_enqueue_style('main-styles', get_stylesheet_directory_uri()
			. '/assets/css/main.css', array(), null);

		/*--------------------------------------------------
		-------------- Connect styles for Blog Archive and Single blog Post ----------- 
		---------------------------------------------------*/

		if (is_singular('podcasts')) {
			wp_enqueue_style('single-podcasts', get_template_directory_uri()
			. '/assets/css/pages/single-podcasts.css', array(), null);
			wp_enqueue_script('page-podcasts', get_stylesheet_directory_uri()
			. '/assets/js/page-podcasts.js', '', '', true);
		}
		if (is_singular('videos')) {
			wp_enqueue_style('single-videos', get_template_directory_uri()
			. '/assets/css/pages/single-videos.css', array(), null);
			wp_enqueue_script('page-videos', get_stylesheet_directory_uri()
			. '/assets/js/page-videos.js', '', '', true);
		}
		if (is_singular('presenters')) {
			wp_enqueue_style('single-presenters', get_template_directory_uri()
			. '/assets/css/pages/single-presenters.css', array(), null);
		}
		// Other Styles Scripts

		wp_enqueue_script('jquery', get_stylesheet_directory_uri()
			. '/assets/libs/jquery/jquery.min.js', '', '', true);

		wp_enqueue_script('main-scripts', get_stylesheet_directory_uri()
			. '/assets/js/main.js', '', '', true);

		wp_enqueue_style('aos-styles', get_stylesheet_directory_uri() . '/assets/libs/aos/aos.css', array(), '1.0');

		wp_enqueue_script('aos-scripts', get_stylesheet_directory_uri() . '/assets/libs/aos/aos.js', array('jquery'), '1.0', true);

		wp_add_inline_script('aos-scripts', '
		AOS.init({
		    once: true, 
		    duration: 1000 
		});');

		wp_register_style('swiper', get_stylesheet_directory_uri()
			. '/assets/libs/swiper/swiper-bundle.min.css', array(), false);
		wp_enqueue_style('swiper');
		wp_register_script('swiper', get_stylesheet_directory_uri()
			. '/assets/libs/swiper/swiper-bundle.min.js', 'jquery', '', false);
		wp_enqueue_script('swiper');

		wp_register_script(
			'fancybox',
			get_stylesheet_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js',
			['jquery'],
			'',
			true
		);
		wp_enqueue_script('fancybox');

		wp_register_style(
			'fancybox',
			get_stylesheet_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css',
			[],
			false
		);
		wp_enqueue_style('fancybox');

		wp_enqueue_script('jquery-ui-scripts', get_stylesheet_directory_uri() . '/assets/libs/jquery-ui/jquery-ui.min.js', array('jquery'), '1.0', true);
	}
}
add_action('wp_enqueue_scripts', 'detect_assets');
