<?php
function my_enqueue_scripts()
{
	wp_enqueue_script('custom-ajax', get_stylesheet_directory_uri() . '/assets/js/ajax-script.js', array('jquery'), '1.0', true);

	wp_localize_script('custom-ajax', 'my_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

function load_posts_by_category()
{
	$category_id = $_POST['category_id'];
	$offset = $_POST['offset'];
	$posts_per_page = $_POST['posts_per_page'];

	$args = [
		'post_type' => 'post',
		'posts_per_page' => -1,
		'offset' => $offset,
	];

	if ($category_id !== 'all') {
		$args['cat'] = $category_id;
	}

	$query = new WP_Query($args);
	ob_start();

	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post(); ?>
			<div class="post-item">
				<div class="post-thumbnail">
					<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('full');
					} else {
						echo '<img src="/wp-content/uploads/2024/09/woocommerce-placeholder.png" alt="' . esc_attr(get_the_title()) . '" />';
					}
					?>
				</div>
				<div class="post-meta">
					<div class="post-categories"><?php the_category(',  '); ?></div>
					<div class="post-date"><?php echo get_the_date(); ?></div>
				</div>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
				<div class="post-excerpt"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
				<a href="<?php the_permalink(); ?>" class="read-more-button"><?php _e('Learn more', 'your-theme-textdomain'); ?></a>
			</div>
<?php endwhile;
	endif;

	$html = ob_get_clean();
	wp_send_json_success(['html' => $html]);
	wp_die();
}
add_action('wp_ajax_load_posts_by_category', 'load_posts_by_category');
add_action('wp_ajax_nopriv_load_posts_by_category', 'load_posts_by_category');



function load_podcasts_by_category()
{
	$category_id = $_POST['category_id'];
	$offset = $_POST['offset'];

	$args = [
		'post_type' => 'podcasts',
		'posts_per_page' => -1,
		'offset' => $offset,
	];

	if ($category_id !== 'all') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'series',
				'field' => 'term_id',
				'terms' => $category_id,
			],
		];
	}

	$query = new WP_Query($args);
	ob_start();

	initPosts($query, 'post-templates/podcasts-item');

	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(['html' => $html]);

	wp_die();
}
add_action('wp_ajax_load_podcasts_by_category', 'load_podcasts_by_category');
add_action('wp_ajax_nopriv_load_podcasts_by_category', 'load_podcasts_by_category');


function load_videos_by_category()
{
	$category_id = $_POST['category_id'];
	$offset = $_POST['offset'];

	$args = [
		'post_type' => 'videos',
		'posts_per_page' => -1,
		'offset' => $offset,
	];
	if ($category_id !== 'all') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'collections',
				'field' => 'term_id',
				'terms' => $category_id,
			],
		];
	}

	$query = new WP_Query($args);
	ob_start();

	initPosts($query, 'post-templates/video-item');

	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(['html' => $html]);

	wp_die();
}

add_action('wp_ajax_load_videos_by_category', 'load_videos_by_category');
add_action('wp_ajax_nopriv_load_videos_by_category', 'load_videos_by_category');


function filter_videos_by_presenter()
{
	$presenter_id = $_POST['presenter_id'];

	// Аргументи для запиту відео
	$args = [
		'post_type' => 'videos',
		'posts_per_page' => -1, // Вивести всі відео
		'post_status' => 'publish', // Тільки опубліковані
	];

	// Якщо вибрано конкретного презентера
	if ($presenter_id !== 'all') {
		$args['meta_query'] = [
			[
				'key' => 'presenter',
				'value' => $presenter_id,
				'compare' => '='
			]
		];
	}

	// Виконання запиту
	$query = new WP_Query($args);

	if ($query->have_posts()) {
		ob_start();
		initPosts($query, 'post-templates/video-item'); // Використовуємо твій шаблон для виводу відео
		$html = ob_get_clean();
		wp_send_json_success(['html' => $html]);  // Повертаємо HTML результат
	} else {
		wp_send_json_error(['message' => __('No videos found', 'your-theme-textdomain')]);
	}

	wp_die(); // Завершуємо виконання AJAX запиту
}

// Додаємо дії для AJAX
add_action('wp_ajax_filter_videos_by_presenter', 'filter_videos_by_presenter');
add_action('wp_ajax_nopriv_filter_videos_by_presenter', 'filter_videos_by_presenter');


function filter_videos_by_type()
{
	$video_type = $_POST['video_type'];

	// Аргументи для запиту відео
	$args = [
		'post_type' => 'videos',
		'posts_per_page' => -1, // Вивести всі відео
		'post_status' => 'publish', // Тільки опубліковані
	];

	// Якщо вибрано безкоштовні відео
	if ($video_type === 'free-content') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'collections',
				'field' => 'slug',
				'terms' => 'free-content',
			]
		];
	}

	// Виконання запиту
	$query = new WP_Query($args);

	// Виконання запиту

	ob_start();

	if ($query->have_posts()) {
		initPosts($query, 'post-templates/video-item'); // Використовуємо шаблон для виводу відео
	} else {
		// Якщо немає результатів, можна вивести повідомлення або просто порожній контент
		echo '<p>' . __('No videos found', 'your-theme-textdomain') . '</p>';
	}

	$html = ob_get_clean();
	wp_send_json_success(['html' => $html]);  // Повертаємо HTML результат

	wp_die(); // Завершуємо виконання AJAX запиту
}

// Додаємо дії для AJAX
add_action('wp_ajax_filter_videos_by_type', 'filter_videos_by_type');
add_action('wp_ajax_nopriv_filter_videos_by_type', 'filter_videos_by_type');


function filter_podcasts_by_presenter()
{
	$presenter_id = $_POST['presenter_id'];

	// Аргументи для запиту відео
	$args = [
		'post_type' => 'podcasts',
		'posts_per_page' => -1, // Вивести всі відео
		'post_status' => 'publish', // Тільки опубліковані
	];

	// Якщо вибрано конкретного презентера
	if ($presenter_id !== 'all') {
		$args['meta_query'] = [
			[
				'key' => 'presenter',
				'value' => $presenter_id,
				'compare' => '='
			]
		];
	}

	// Виконання запиту
	$query = new WP_Query($args);

	if ($query->have_posts()) {
		ob_start();
		initPosts($query, 'post-templates/podcasts-item'); // Використовуємо твій шаблон для виводу відео
		$html = ob_get_clean();
		wp_send_json_success(['html' => $html]);  // Повертаємо HTML результат
	} else {
		wp_send_json_error(['message' => __('No podcasts found', 'your-theme-textdomain')]);
	}

	wp_die(); // Завершуємо виконання AJAX запиту
}

// Додаємо дії для AJAX
add_action('wp_ajax_filter_podcasts_by_presenter', 'filter_podcasts_by_presenter');
add_action('wp_ajax_nopriv_filter_podcasts_by_presenter', 'filter_podcasts_by_presenter');

function load_courses_by_category()
{
	$category_id = $_POST['category_id'];
	$offset = $_POST['offset'];

	// Основний запит на пости типу sfwd-courses
	$args = [
		'post_type' => 'sfwd-courses', // Завжди запитуємо пости типу sfwd-courses
		'posts_per_page' => -1, // Встановлено -1, щоб отримати всі курси
		'offset' => $offset,
	];

	// Якщо вибрана категорія не "all", додаємо tax_query
	if ($category_id !== 'all') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'ld_course_category',
				'field' => 'term_id',
				'terms' => $category_id,
			],
		];
	}

	// Підготовка і виконання запиту
	$query = new WP_Query($args);
	ob_start();

	// Виведення постів через функцію initPosts
	initPosts($query, 'post-templates/course-item');

	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(['html' => $html]);

	wp_die();
}
add_action('wp_ajax_load_courses_by_category', 'load_courses_by_category');
add_action('wp_ajax_nopriv_load_courses_by_category', 'load_courses_by_category');

function load_courses_by_search()
{
	$search_term = sanitize_text_field($_POST['search_term']);
	$category_id = $_POST['category_id'];
	$offset = $_POST['offset'];

	$args = [
		'post_type' => 'sfwd-courses',
		'posts_per_page' => -1,
		'offset' => $offset,
		's' => $search_term, // Додаємо параметр пошуку
	];

	if ($category_id !== 'all') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'ld_course_category',
				'field' => 'term_id',
				'terms' => $category_id,
			],
		];
	}

	$query = new WP_Query($args);
	ob_start();

	initPosts($query, 'post-templates/course-item');

	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(['html' => $html]);

	wp_die();
}
add_action('wp_ajax_load_courses_by_search', 'load_courses_by_search');
add_action('wp_ajax_nopriv_load_courses_by_search', 'load_courses_by_search');
