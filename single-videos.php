<?php get_header();
$presenter = get_field('presenter');
$duration = get_field('duration');
$behind_paywall = get_field('behind_paywall');
$video_platform = get_field('video_platform');
$video_id = get_field('video_id');
$video_thumbnail = get_field('video_thumbnail');
$video_short_description = get_field('video_short_description');
$main_description_title = get_field('main_description_title');
$main_description = get_field('main_description');
$presenter = get_field('presenter');
// $main_description_image = get_field('main_description_image');
$mainpath = get_stylesheet_directory_uri();


$series = get_the_terms(get_the_ID(), 'collections');
$subscriptions_group = get_field('subscriptions_group', 'options');
$popup_title = isset($subscriptions_group['popup_title']) ? $subscriptions_group['popup_title'] : null;


$popup_description = isset($subscriptions_group['popup_description']) ? $subscriptions_group['popup_description'] : null;
$popup_link	= isset($subscriptions_group['popup_link']) ? $subscriptions_group['popup_link'] : null;
$popup_caption	= isset($subscriptions_group['popup_caption']) ? $subscriptions_group['popup_caption'] : null;
?>

<main>

	<div class="single-podcast">
		<div class="container">
			<?php if (!empty($series) && !is_wp_error($series)) : ?>
				<div class="podcast-series">
					<?php echo esc_html($series[0]->name); ?>
				</div>
			<?php endif; ?>

			<h1><?php the_title(); ?></h1>
			<?php if ($video_short_description) : ?>
				<p class="podcast-short-description desc"><?php echo $video_short_description; ?></p>
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

			<?php
			$behind_paywall = get_field('behind_paywall'); // Отримуємо значення чекбоксу

			if (
				current_user_can('administrator') ||
				wc_memberships_is_user_active_member(get_current_user_id(), 'manually-assigned-team-membership-1-year') ||
				wc_memberships_is_user_active_member(get_current_user_id(), 'leader-connect-team-member') ||
				wc_memberships_is_user_active_member(get_current_user_id(), 'leader-connect-individual') ||
				!$behind_paywall
			) {

				if ($video_platform && $video_id) :
			?>
					<a href="#video-popup-<?php echo esc_attr($video_id); ?>" data-fancybox class="video-box">
						<div class="video-box-img ">
							<?php
							if ($video_thumbnail) {		?>
								<?php echo wp_get_attachment_image($video_thumbnail, 'full'); ?>
								<img class="img" src='<?php echo $video_thumbnail['url']; ?>' alt='<?php echo $image['alt']; ?>' />
							<?php } else {
							?>
								<img class="img" src=" <?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.png'; ?>" />
							<?php
							}
							?>
							<?php if ($duration): ?>
								<div class="duration">
									<?php
									$hours = floor($duration / 60);
									$minutes = $duration % 60;
									echo sprintf('%02d:%02d', $hours, $minutes);
									?>
								</div>
							<?php endif; ?>
							<div class="video-tag">
								<?php if ($behind_paywall) { ?>
									<img src="<?php echo $mainpath ?>/assets/images/premium.png" alt="premium">
								<?php } else { ?>
									<img src="<?php echo $mainpath ?>/assets/images/free.png" alt="premium">
								<?php
								}
								?>
							</div>

						</div>
						<div style="display: none;" id="video-popup-<?php echo esc_attr($video_id); ?>" class="popup">
							<?php if ($video_platform === 'youtube') : ?>
								<!-- YouTube iframe -->
								<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
							<?php elseif ($video_platform === 'vimeo') : ?>
								<!-- Vimeo iframe -->
								<iframe src="https://player.vimeo.com/video/<?php echo esc_attr($video_id); ?>?autoplay=1&hd=1&show_title=1&show_byline=1&show_portrait=0&fullscreen=1" width="640" height="360" frameborder="0" allowfullscreen></iframe>
							<?php endif; ?>
						</div>
					</a>
				<?php
				endif;
			} else {	?>
				<a href="#subscribe-popup" data-fancybox class="video-box ">
					<div class="video-box-img <?php echo $behind_paywall ? 'blur' : '' ?>">
						<?php
						if ($video_thumbnail) { ?>
							<?php echo wp_get_attachment_image($video_thumbnail, 'full'); ?>
							<img class="img" src='<?php echo $video_thumbnail['url']; ?>' alt='<?php echo $image['alt']; ?>' />
						<?php } else { ?>
							<img class="img" src=" <?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.png'; ?>" />
						<?php } ?>
						<?php if ($duration): ?>
							<div class="duration">
								<?php
								$hours = floor($duration / 60);
								$minutes = $duration % 60;
								echo sprintf('%02d:%02d', $hours, $minutes);
								?>
							</div>
						<?php endif; ?>
						<div class="video-tag">
							<?php if ($behind_paywall) { ?>
								<img src="<?php echo $mainpath ?>/assets/images/premium.png" alt="premium">
							<?php } else { ?>
								<img src="<?php echo $mainpath ?>/assets/images/free.png" alt="premium">
							<?php
							}
							?>
						</div>
					</div>
				</a>
				<div style="display: none;" id="subscribe-popup" class="popup">
					<div class="subscribe-popup">
						<?php if ($popup_title): ?>
							<h2><?php echo $popup_title ?></h2>
						<?php endif; ?>
						<?php if ($popup_description): ?>
							<div class="subscribe-popup__desc">
								<?php echo $popup_description ?>
							</div>
						<?php endif; ?>
						<?php if ($popup_link): ?>
							<div class="subscribe-popup__btn">
								<?php echo initLinkHref($popup_link, 'btn') ?>
							</div>
						<?php endif; ?>
						<?php if ($popup_caption): ?>
							<div class="subscribe-popup__caption">
								<?php echo $popup_caption ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php	}
			?>

			<section class="about-block">
				<!-- <?php if ($main_description_image) : ?>
					<div class="about-block__img" data-aos="fade-up">
						<?php echo wp_get_attachment_image($main_description_image, 'full'); ?>
					</div>
				<?php endif; ?> -->
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
			$posts = new WP_Query(array(
				'post_type' => 'videos',
				'posts_per_page' => 16,
				'post_status' => 'publish',
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
							More from
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
						<div class="swiper  popular__swiper-video-more">
							<div class="swiper-wrapper">
								<?php if ($posts) : ?>
									<?php
									initPosts($posts, 'post-templates/video-slider-item');
									?>
								<?php endif; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php

			$term_id = $series[0]->term_id;
			$posts = new WP_Query(array(
				'post_type' => 'videos',
				'posts_per_page' => 16,
				'post_status' => 'publish',
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'collections',
						'field' => 'term_id',
						'terms' => $term_id,
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
						<div class="swiper  popular__swiper-video">
							<div class="swiper-wrapper">
								<?php if ($posts) : ?>
									<?php
									initPosts($posts, 'post-templates/video-slider-item');
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