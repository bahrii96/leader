<?php get_header();
$presenter = get_field('presenter');
$duration = get_field('duration');
$podcast_thumbnail = get_field('podcast_thumbnail');
$apple_podcasts_link = get_field('apple_podcasts_link');
$spotify_link = get_field('spotify_link');
$youtube_video_id = get_field('youtube_video_id');
$podcast_short_description = get_field('podcast_short_description');
$main_description_title = get_field('main_description_title');
$main_description = get_field('main_description');
$main_description_image = get_field('main_description_image');
$mainpath = get_stylesheet_directory_uri();
// Отримуємо таксономію серії
$series = get_the_terms(get_the_ID(), 'series');
$presenter = get_field('presenter');
?>

<main>

	<section class="single-podcast">
		<div class="container">
			<!-- Відображення таксономії серії -->
			<?php if (!empty($series) && !is_wp_error($series)) : ?>
				<div class="podcast-series">
					<?php echo esc_html($series[0]->name); ?>
				</div>
			<?php endif; ?>

			<h1><?php the_title(); ?></h1>
			<?php if ($podcast_short_description) : ?>
				<p class="podcast-short-description desc"><?php echo $podcast_short_description; ?></p>
			<?php endif; ?>

			<div class="meta-box">
				<div class="presenter">
					<?php if ($presenter && is_int($presenter)):
						$presenter_post = get_post($presenter);
						if ($presenter_post):
							$presenter_link = get_permalink($presenter_post->ID);
							$profile_picture = get_field('profile_picture', $presenter_post->ID); // Отримуємо зображення профілю
					?>
							<?php if ($profile_picture) { ?>
								<div class="presenter-thumbnail">
									<?php echo wp_get_attachment_image($profile_picture, 'full'); ?>
								</div>
							<?php } else { ?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.png'; ?>" alt="Default Thumbnail" />
							<?php } ?>
							<div>by
								<a href="<?php echo esc_url($presenter_link); ?>">
									<?php echo esc_html($presenter_post->post_title); ?>
								</a>
							</div>
					<?php
						endif;
					endif; ?>
				</div>
				<span>|</span>
				<div class="meta">
					<?php if ($duration): ?>
						<div class="duration">
							<?php echo $duration ?> Minutes
						</div>
					<?php endif; ?>
					<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.3" />
					</svg>

					<div class="post-date"><?php echo get_the_date(); ?></div>
				</div>
			</div>
			<?php if ($spotify_link) {
				$spotify_episode_id = str_replace('https://open.spotify.com/episode/', '', $spotify_link);
			?>
				<div style="border-radius: 12px; background-color: black; padding: 10px;">
					<iframe
						style="border-radius: 12px; background-color: transparent; border: none;"
						src="https://open.spotify.com/embed/episode/<?php echo esc_attr($spotify_episode_id); ?>?theme=0 "
						width="100%"
						height="352"
						frameborder="0"
						allowfullscreen=""
						allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
						loading="lazy">
					</iframe>
				</div>
			<?php }
			?>
			<div class="podcast-links">
				<?php if ($spotify_link) : ?>
					<a href="<?php echo esc_url($spotify_link); ?>" class="button-box spotify" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo $mainpath ?>/assets/images/spotify.png" alt="">Spotify
					</a>
				<?php endif; ?>
				<?php if ($apple_podcasts_link) : ?>
					<a href="<?php echo esc_url($apple_podcasts_link); ?>" class="button-box apple-podcast" target="_blank" rel="noopener noreferrer"><img src="<?php echo $mainpath ?>/assets/images/apple.png" alt="">Apple Podcast</a>
				<?php endif; ?>
			</div>

			<?php if ($youtube_video_id) : ?>
				<div class="youtube-player">
					<?php if (!empty($series) && !is_wp_error($series)) : ?>
						<div class="series">
							<?php echo esc_html($series[0]->name); ?>
						</div>
					<?php endif; ?>

					<h2><?php the_title(); ?></h2>
					<iframe width="100%" height="420" src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_video_id); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php endif; ?>

			<section class="about-block">
				<?php if ($main_description_image) : ?>
					<div class="about-block__img" data-aos="fade-up">
						<?php echo wp_get_attachment_image($main_description_image, 'full'); ?>
					</div>
				<?php endif; ?>
				<div class="about-block__left">
					<?php if ($main_description_title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $main_description_title ?></h2>
					<?php endif; ?>
					<?php if ($main_description) : ?>
						<div class="about-block__desc desc" data-aos="fade-up">
							<?php echo $main_description ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		</div>

		<section class="podcast-more">

			<?php
			$series_ids = wp_list_pluck($series, 'term_id');
			$posts = new WP_Query(array(
				'post_type' => 'podcasts',
				'posts_per_page' => 16,
				'post_status' => 'publish',
				'orderby' => 'rand',
				'meta_query' => array(
					array(
						'key' => 'presenter',
						'value' => $presenter,
						'compare' => '='
					)
				)
			));
			?>
			<div class="popular-block">
				<div class="container">
					<div class="popular-block__top" data-aos="fade-up">
						<h2 class="title">
							More
							<?php if ($presenter && is_int($presenter)):
								$presenter_post = get_post($presenter);
								if ($presenter_post):
									$presenter_link = get_permalink($presenter_post->ID);
							?>
									<a href="<?php echo esc_url($presenter_link); ?>">
										<?php echo esc_html($presenter_post->post_title); ?>
									</a>
							<?php
								endif;
							endif; ?>
						</h2>

						<div class="swiper-nav">
							<button type="button" class="swiper-prev-testimonials-more nav">
								<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle opacity="0.2" cx="28" cy="28" r="27.5" stroke="white" />
									<path d="M22 28L28 28L34 28M22 28L28 34M22 28L28 22" stroke="#FFB200" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							</button>
							<button type="button" class="swiper-next-testimonials-more nav">
								<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle opacity="0.2" cx="28" cy="28" r="27.5" stroke="white" />
									<path d="M22 28L28 28L34 28M22 28L28 34M22 28L28 22" stroke="#FFB200" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
						</div>
					</div>
					<div class="popular-block__box" data-aos="fade-up">
						<div class="swiper  popular__swiper-more">
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
			</div>
			<?php
			$series_ids = wp_list_pluck($series, 'term_id');
			$posts = new WP_Query(array(
				'post_type' => 'podcasts',
				'posts_per_page' => 16,
				'post_status' => 'publish',
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'series',
						'field' => 'term_id',
						'terms' => $series_ids,
					),
				),
			));
			?>
			<div class="popular-block">
				<div class="container">
					<div class="popular-block__top" data-aos="fade-up">
						<h2 class="title">
							More <?php echo $series[0]->name; ?>
						</h2>
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

			</div>
		</section>




</main>

<?php get_footer(); ?>