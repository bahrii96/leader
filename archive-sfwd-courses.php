<?php get_header();
$courses_archive = get_field('courses_archive', 'options');
$hero_group = isset($courses_archive['hero_group']) ? $courses_archive['hero_group'] : null;

?>
<main>
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$description = $hero_group['description'];
		$link = $hero_group['link'];
	?>
		<section class="hero-block">
			<div class="hero-block__overlay" style="background-image: url(<?php echo $overlay ?>);">
			</div>
			<div class="container">
				<?php if ($title) : ?>
					<h1 class="title" data-aos="fade-up" data-aos-delay="500"><?php echo $title ?></h1>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="hero-block__desc desc" data-aos="fade-up" data-aos-delay="550">
						<?php echo $description ?>
					</div>
				<?php endif; ?>
				<?php if ($link) : ?>
					<div class="hero-block__btn desc" data-aos="fade-up" data-aos-delay="550">
						<?php echo initLinkHref($link, 'btn') ?>
					</div>
				<?php endif; ?>

			</div>
		</section>
	<?php endif; ?>
	<!-- dev -->

	<section class="post-block">
		<div class="container">

			<div class="search-container" data-aos="fade-up">
				<input type="text" id="search-input" placeholder="<?php _e('Search courses...', 'your-theme-textdomain'); ?>" />
				<div id="search-button"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.2505 12.25L9.21887 9.21845M9.21887 9.21845C10.0394 8.39794 10.5003 7.2851 10.5003 6.12474C10.5003 4.96437 10.0394 3.85153 9.21887 3.03103C8.39837 2.21053 7.28553 1.74957 6.12516 1.74957C4.9648 1.74957 3.85196 2.21053 3.03146 3.03103C2.21095 3.85153 1.75 4.96437 1.75 6.12474C1.75 7.2851 2.21095 8.39794 3.03146 9.21845C3.85196 10.0389 4.9648 10.4999 6.12516 10.4999C7.28553 10.4999 8.39837 10.0389 9.21887 9.21845Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</div>
			</div>

			<div class="post-block-categories ">

				<ul class="desktop-categories" data-aos="fade-up">
					<li><a href="#" class="category-link active" data-category-id="all"><?php _e('All', 'your-theme-textdomain'); ?></a></li>
					<?php
					$terms = get_terms([
						'taxonomy' => 'ld_course_category',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'post_type' => 'sfwd-courses',
					]);

					foreach ($terms as $term) {
						echo '<li><a href="#" class="category-link" data-category-id="' . $term->term_id . '">' . $term->name . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="mobile-categories" data-aos="fade-up">
				<select id="mobile-category-select">
					<option value="all"><?php _e('All', 'your-theme-textdomain'); ?></option>
					<?php
					$terms = get_terms([
						'taxonomy' => 'ld_course_category',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'post_type' => 'sfwd-courses',
					]);

					foreach ($terms as $term) {
						echo '<option value="' . $term->term_id . '">' . $term->name .
							'</option>';
					}
					?>
				</select>
			</div>



			<div id="posts-container" class="post-block__list">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = [
					'post_type' => 'sfwd-courses',
					'posts_per_page' => 12,
					'paged' => $paged
				];
				$query = new WP_Query($args);
				initPosts($query, 'post-templates/course-item');
				?>
			</div>
			<div class="pagination">
				<?php
				echo paginate_links([
					'total' => $query->max_num_pages,
					'prev_text' => __('<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="8" transform="matrix(-1 0 0 1 40 0)" fill="#131313"/>
<rect x="-0.5" y="0.5" width="39" height="39" rx="7.5" transform="matrix(-1 0 0 1 39 0)" stroke="white" stroke-opacity="0.1"/>
<path d="M26 20L14 20M14 20L20 26M14 20L20 14" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
', 'your-theme-textdomain'),
					'next_text' => __('<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="8" fill="#131313"/>
<rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="white" stroke-opacity="0.1"/>
<path d="M14 20L26 20M26 20L20 26M26 20L20 14" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>', 'your-theme-textdomain'),
					'add_fragment' => '#posts-container', // Додаємо якір
				]);
				?>
			</div>

		</div>
	</section>
</main>

<?php get_footer(); ?>