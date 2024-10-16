<?php /* Template name: Podcasts Page */
get_header();
$page_podcasts = get_field('page_podcasts');


if ($page_podcasts) {
	$hero_group = $page_podcasts['hero_group'];
	$popular_group = $page_podcasts['popular_group'];
};
?>
<main>
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$description = $hero_group['description'];
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

			</div>
		</section>
	<?php endif; ?>

	<?php
	$subscriptions_group = get_field('subscriptions_group', 'options');
	$subscriptions_overlay = isset($subscriptions_group['overlay']) ? $subscriptions_group['overlay'] : null;
	$subscriptions_title = isset($subscriptions_group['title']) ? $subscriptions_group['title'] : null;
	$subscriptions_link = isset($subscriptions_group['link']) ? $subscriptions_group['link'] : null;
	?>

	<section class="subscriptions-block" data-aos="fade-up">
		<div class="container">
			<div class="subscriptions-block__box" style="background-image: url(<?php echo $subscriptions_overlay ?>);">
				<?php if ($subscriptions_title) : ?>
					<div class="title" data-aos="fade-up"><?php echo $subscriptions_title ?></div>
				<?php endif; ?>
				<?php if ($subscriptions_link) : ?>
					<div class="hero-block__link" data-aos="fade-up">
						<?php echo initLinkHref($subscriptions_link, 'btn') ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php if ($popular_group) :
		$title = $popular_group['title'];
		$list = $popular_group['list'];

	?>
		<?php
		$posts = new WP_Query(array(
			'post_type' => 'podcasts',
			'posts_per_page' => 7,
			'post_status'    => 'publish',
			'post__in' => $list,
			'orderby' => 'post__in',
		));
		?>
		<section class="popular-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="popular-block__top" data-aos="fade-up">
					<?php if ($title) : ?>
						<h2 class="title">
							<?php echo $title ?>
						</h2>
					<?php endif; ?>
					<div class="swiper-nav">
						<button type="button" class="swiper-prev-testimonials nav">
							<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle opacity="0.2" cx="28" cy="28" r="27.5" stroke="white" />
								<path d="M22 28L28 28L34 28M22 28L28 34M22 28L28 22" stroke="#FFB200" stroke-linecap="round" stroke-linejoin="round" />
							</svg>

						</button>
						<button type="button" class="swiper-next-testimonials nav">
							<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle opacity="0.2" cx="28" cy="28" r="27.5" stroke="white" />
								<path d="M22 28L28 28L34 28M22 28L28 34M22 28L28 22" stroke="#FFB200" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</button>
					</div>
				</div>
				<div class="popular-block__box" data-aos="fade-up">
					<div class="swiper  popular__swiper">
						<div class="swiper-wrapper">
							<?php if ($posts) : ?>
								<?php
								initPosts($posts, 'post-templates/podcasts-slider-item');
								?>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</section>
	<?php endif; ?>




	<section class="post-block">
		<div class="container">
			<div class="post-block-categories ">
				<h2 data-aos="fade-up"><?php _e('Our Podcasts', 'your-theme-textdomain'); ?></h2>
				<ul class="desktop-categories" data-aos="fade-up">
					<li><a href="#" class="category-link active" data-category-id="all"><?php _e('All', 'your-theme-textdomain'); ?></a></li>
					<?php
					$terms = get_terms([
						'taxonomy' => 'series',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'post_type' => 'podcasts',
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
						'taxonomy' => 'series',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'post_type' => 'podcasts',
					]);

					foreach ($terms as $term) {
						echo '<option value="' . $term->term_id . '">' . $term->name .
							'</option>';
					}
					?>
				</select>
			</div>


			<div class="presenter-filter" data-aos="fade-up">
				<select id="presenter-select">
					<option value="all"><?php _e('All Presenters', 'your-theme-textdomain'); ?></option>
					<?php
					$presenters = get_posts([
						'post_type' => 'presenters',
						'posts_per_page' => -1,
						'post_status' => 'publish',
					]);

					if ($presenters) {
						foreach ($presenters as $presenter) {
							echo '<option value="' . $presenter->ID . '">' . $presenter->post_title . '</option>';
						}
					} else {
						echo '<option disabled>' . __('No presenters found', 'your-theme-textdomain') . '</option>';
					}
					?>
				</select>
			</div>

			<div id="posts-container" class="post-block__list">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = [
					'post_type' => 'podcasts',
					'posts_per_page' => 12,
					'paged' => $paged
				];
				$query = new WP_Query($args);
				initPosts($query, 'post-templates/podcasts-item');
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