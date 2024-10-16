<?php /* Template name: News Page */
get_header();

$news_page = get_field('news_page');
if ($news_page) {
	$hero_group = $news_page['hero_group'];
};
?>
<main>

	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$description = $hero_group['description'];

	?>
		<section class="hero-block">
			<div class="hero-block__overlay" style="background-image: url(<?php echo $overlay['url'] ?>);">
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

	<section class="post-popular">
		<div class="container">

			<div class="post-popular__list">
				<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => 1,
					'tag' => 'popular' // Виводимо пости з тегом 'popular'
				];
				$query = new WP_Query($args);

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); ?>
						<div class="post-popular__item">
							<div class="post-thumbnail" data-aos="fade-up">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('full');
								} else {
									echo '<img src="/wp-content/uploads/2024/09/woocommerce-placeholder.png" alt="' . esc_attr(get_the_title()) . '" />';
								}
								?>
							</div>
							<div class="post-popular__right" data-aos="fade-up">
								<div class="post-meta" data-aos="fade-up">
									<!-- Виводимо теги замість категорій -->
									<div class="post-tags" data-aos="fade-up"><?php the_tags('', ', '); ?></div>
									<div class="post-date" data-aos="fade-up"><?php echo get_the_date(); ?></div>
								</div>

								<div class="post-title" data-aos="fade-up">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>

								<div class="post-excerpt" data-aos="fade-up"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
								<a href="<?php the_permalink(); ?>" class="read-more-button" data-aos="fade-up"> <?php _e('Learn more', 'your-theme-textdomain'); ?></a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e('No posts found', 'your-theme-textdomain'); ?></p>
				<?php endif;
				wp_reset_postdata(); ?>
			</div>

		</div>
	</section>


	<section class="post-block">
		<div class="container">
			<div class="post-block-categories ">
				<h2 data-aos="fade-up"><?php _e('Explore all posts', 'your-theme-textdomain'); ?></h2>
				<ul class="desktop-categories" data-aos="fade-up">
					<li><a href="#" class="category-link active" data-category-id="all"><?php _e('All', 'your-theme-textdomain'); ?></a></li>
					<?php
					$categories = get_categories(['orderby' => 'name', 'order' => 'ASC']);
					foreach ($categories as $category) {
						echo '<li><a href="#" class="category-link" data-category-id="' . $category->term_id . '">' . $category->name . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="mobile-categories" data-aos="fade-up">
				<select id="mobile-category-select">
					<option value="all"><?php _e('All', 'your-theme-textdomain'); ?></option>
					<?php
					$categories = get_categories(['orderby' => 'name', 'order' => 'ASC']);
					foreach ($categories as $category) {
						echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
					}
					?>
				</select>
			</div>
			<!-- Блок постів -->
			<div id="posts-container" class="post-block__list">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = [
					'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => $paged

				];
				$query = new WP_Query($args);

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); ?>
						<div class="post-item">
							<div class="post-thumbnail" data-aos="fade-up">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('full');
								} else {
									echo '<img src="/wp-content/uploads/2024/09/woocommerce-placeholder.png" alt="' . esc_attr(get_the_title()) . '" />';
								}
								?>
							</div>

							<div class="post-meta" data-aos="fade-up">
								<div class="post-categories" data-aos="fade-up"><?php the_category(',  '); ?></div>
								<div class="post-date" data-aos="fade-up"><?php echo get_the_date(); ?></div>
							</div>

							<div class="post-title" data-aos="fade-up">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>

							<div class="post-excerpt" data-aos="fade-up"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
							<a href="<?php the_permalink(); ?>" class="read-more-button" data-aos="fade-up"><?php _e('Learn more', 'your-theme-textdomain'); ?></a>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e('No posts found', 'your-theme-textdomain'); ?></p>
				<?php endif;
				wp_reset_postdata(); ?>
			</div>

			<div class="pagination" data-aos="fade-up">
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
</svg>', 'your-theme-textdomain')
				]);
				?>
			</div>
		</div>
	</section>

</main>
<?php get_footer(); ?>