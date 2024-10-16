<?php get_header();
$tagline = get_field('tagline');
$profile_picture = get_field('profile_picture');
$short_bio = get_field('short_bio');
$links = get_field('links');
$main_bio = get_field('main_bio');
$main_bio_image = get_field('main_bio_image');
$main_bio_title = get_field('main_bio_title');


?>

<main>

	<section class="about-block" id="<?php echo $block_id  ?>">
		<div class="container">
			<div class="about-block__left">
				<h1 data-aos="fade-up"><?php echo the_title() ?></h1>
				<?php if ($tagline) : ?>
					<h2 class="title" data-aos="fade-up"><?php echo $tagline ?></h2>
				<?php endif; ?>
				<?php if ($short_bio) : ?>
					<div class="about-block__desc desc" data-aos="fade-up">
						<?php echo $short_bio ?>
					</div>
				<?php endif; ?>

				<?php if (is_array($links)): ?>
					<div class="about-block__links" data-aos="fade-up">

						<?php foreach ($links as $item) {
							$logo = $item['logo'];
							$link = $item['link'];
						?>
							<a href="<?php echo $link ?>" target="_blank">
								<?php echo wp_get_attachment_image($logo, 'full'); ?>
							</a>

						<?php } ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($profile_picture) : ?>
				<div class="about-block__img" data-aos="fade-up">
					<?php echo wp_get_attachment_image($profile_picture, 'full'); ?>
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

	<section class="about-main" id="<?php echo $block_id  ?>">
		<div class="container">
			<div class="about-main__left">
				<?php if ($main_bio_title) : ?>
					<h2 class="title" data-aos="fade-up"><?php echo $main_bio_title ?></h2>
				<?php endif; ?>
				<?php if ($main_bio) : ?>
					<div class="about-main__desc desc" data-aos="fade-up">
						<?php echo $main_bio ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($main_bio_image) : ?>
				<div class="about-main__img" data-aos="fade-up">
					<?php echo wp_get_attachment_image($main_bio_image, 'full'); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>


	<?php
	$presenter_id = get_the_ID();

	$podcasts_query = new WP_Query(array(
		'post_type' => 'podcasts',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => 'presenter',
				'value' => $presenter_id,
				'compare' => '='
			)
		)
	));
	?>
	<?php if ($podcasts_query->have_posts()) : ?>
		<div class="podcasts-block ">
			<div class="container">
				<h2 class="title">
					Podcasts
				</h2>
				<div class="podcasts-block__list">
					<?php if ($podcasts_query) : ?>
						<?php
						initPosts($podcasts_query, 'post-templates/podcasts-item');
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php
	$presenter_id = get_the_ID();

	$video_query = new WP_Query(array(
		'post_type' => 'videos',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => 'presenter',
				'value' => $presenter_id,
				'compare' => '='
			)
		)
	));
	?>
	<?php if ($video_query->have_posts()) : ?>
		<div class="container">
			<h2 class="title">
				Video
			</h2>
			<div class="video-list">

					<?php if ($video_query) : ?>
						<?php
						initPosts($video_query, 'post-templates/video-item');
						?>
					<?php endif; ?>

			</div>
		</div>
	<?php endif; ?>
</main>

<?php get_footer();
