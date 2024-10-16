<?php
$duration = get_field('duration', $post->ID);
$podcast_thumbnail = get_field('podcast_thumbnail', $post->ID);
$presenter = get_field('presenter', $post->ID);
?>


<div class="post-item" data-aos="fade-up">
	<div class="post-item__img">
		<?php
		if ($podcast_thumbnail) {		?>
			<?php echo wp_get_attachment_image($podcast_thumbnail, 'full'); ?>
		<?php } else {
		?>
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.png'; ?>" />
		<?php
		}
		?>
	</div>

	<div class="post-item__box">
		<div class="post-item__top">
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

		<div class="title">
			<?php the_title() ?>
		</div>
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

		<div class="post-item__btn">
			<a class="btn" href="<?php the_permalink(); ?>">Listen Now</a>
			<svg width="72" height="32" viewBox="0 0 72 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="16" cy="16" r="16" fill="white" fill-opacity="0.1" />
				<g clip-path="url(#clip0_602_4703)">
					<path d="M21.3033 21.3034C22.3522 20.2545 23.0665 18.9181 23.3559 17.4633C23.6453 16.0084 23.4968 14.5004 22.9291 13.13C22.3614 11.7595 21.4001 10.5882 20.1668 9.76409C18.9334 8.93999 17.4834 8.50012 16 8.50012C14.5166 8.50012 13.0666 8.93999 11.8332 9.76409C10.5999 10.5882 9.63858 11.7595 9.07092 13.13C8.50326 14.5004 8.35473 16.0084 8.64411 17.4633C8.93349 18.9181 9.64779 20.2545 10.6967 21.3034" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M15.8054 24.3333H16.1954C16.6017 24.3334 16.994 24.1851 17.2986 23.9162C17.6032 23.6473 17.7992 23.2765 17.8495 22.8733L18.2662 19.54C18.2955 19.3054 18.2746 19.0674 18.2049 18.8415C18.1351 18.6157 18.0182 18.4073 17.8617 18.2301C17.7053 18.053 17.513 17.9111 17.2975 17.8139C17.082 17.7168 16.8484 17.6666 16.612 17.6666H15.3887C15.1524 17.6666 14.9187 17.7168 14.7032 17.8139C14.4878 17.9111 14.2955 18.053 14.139 18.2301C13.9826 18.4073 13.8656 18.6157 13.7959 18.8415C13.7261 19.0674 13.7052 19.3054 13.7345 19.54L14.1512 22.8733C14.2016 23.2765 14.3975 23.6473 14.7021 23.9162C15.0067 24.1851 15.3991 24.3334 15.8054 24.3333Z" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M14.333 13.5C14.333 13.9421 14.5086 14.366 14.8212 14.6786C15.1337 14.9911 15.5576 15.1667 15.9997 15.1667C16.4417 15.1667 16.8656 14.9911 17.1782 14.6786C17.4907 14.366 17.6663 13.9421 17.6663 13.5C17.6663 13.058 17.4907 12.6341 17.1782 12.3215C16.8656 12.009 16.4417 11.8334 15.9997 11.8334C15.5576 11.8334 15.1337 12.009 14.8212 12.3215C14.5086 12.6341 14.333 13.058 14.333 13.5Z" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
				</g>
				<circle cx="56" cy="16" r="16" fill="white" fill-opacity="0.1" />
				<g clip-path="url(#clip1_602_4703)">
					<path d="M48.5 16C48.5 16.9849 48.694 17.9602 49.0709 18.8701C49.4478 19.7801 50.0003 20.6069 50.6967 21.3033C51.3931 21.9997 52.2199 22.5522 53.1299 22.9291C54.0398 23.306 55.0151 23.5 56 23.5C56.9849 23.5 57.9602 23.306 58.8701 22.9291C59.7801 22.5522 60.6069 21.9997 61.3033 21.3033C61.9997 20.6069 62.5522 19.7801 62.9291 18.8701C63.306 17.9602 63.5 16.9849 63.5 16C63.5 15.0151 63.306 14.0398 62.9291 13.1299C62.5522 12.2199 61.9997 11.3931 61.3033 10.6967C60.6069 10.0003 59.7801 9.44781 58.8701 9.0709C57.9602 8.69399 56.9849 8.5 56 8.5C55.0151 8.5 54.0398 8.69399 53.1299 9.0709C52.2199 9.44781 51.3931 10.0003 50.6967 10.6967C50.0003 11.3931 49.4478 12.2199 49.0709 13.1299C48.694 14.0398 48.5 15.0151 48.5 16Z" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M52.667 15.9775C54.7503 14.75 57.2503 15.1667 58.917 16.4167" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M53.5 18.5C54.75 17.6666 56.8333 17.6666 57.6667 18.9166" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M51.833 13.5C53.4997 12.6667 56.833 11.8333 60.1663 13.9167" stroke="#FFB200" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
				</g>
				<defs>
					<clipPath id="clip0_602_4703">
						<rect width="20" height="20" fill="white" transform="translate(6 6)" />
					</clipPath>
					<clipPath id="clip1_602_4703">
						<rect width="20" height="20" fill="white" transform="translate(46 6)" />
					</clipPath>
				</defs>
			</svg>

		</div>
	</div>

</div>