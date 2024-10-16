<?php /* Template name: Videos Collection Page */
get_header();
$collection = get_field('collection');
$intro_text
	= get_field('intro_text');
$intro_image = get_field('intro_image');


?>
<main>

	<section class="hero-block collection">
		<div class="hero-block__overlay" style="background-image: url(<?php echo $intro_image ?>);">
		</div>
		<div class="container">
			<h1 class="title" data-aos="fade-up" data-aos-delay="500"><?php echo the_title() ?></h1>
			<?php if ($intro_text) : ?>
				<div class="hero-block__desc desc" data-aos="fade-up" data-aos-delay="550">
					<?php echo $intro_text ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

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

	<section class="post-block">
		<div class="container">
			<div id="posts-container" class="post-block__list">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = [
					'post_type' => 'videos',
					'posts_per_page' => 12,
					'paged' => $paged,
				];
				if ($collection) {
					$args['tax_query'] = [
						[
							'taxonomy' => 'collections',
							'field' => 'term_id',
							'posts_per_page' => -1,
							'terms' => $collection,
						],
					];
				}
				$query = new WP_Query($args);
				initPosts($query, 'post-templates/video-item');
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
</svg>', 'your-theme-textdomain')
				]);
				?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>