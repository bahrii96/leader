<?php
$duration = get_field('duration', $post->ID);
$video_thumbnail = get_field('video_thumbnail', $post->ID);
$presenter = get_field('presenter', $post->ID);
$behind_paywall = get_field('behind_paywall', $post->ID);
$mainpath = get_stylesheet_directory_uri();

?>


<a href="<?php the_permalink(); ?>" class="post-item" data-aos="fade-up">
	<div class="post-item__img <?php echo $behind_paywall ? 'blur' : '' ?>"">
		<?php
		if ($video_thumbnail) {		?>
			<img class="img" src='<?php echo $video_thumbnail['url']; ?>' alt='<?php echo $image['alt']; ?>' />
<?php } else {
?>
	<img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.png'; ?>" />
<?php
		}
?>
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

<div class="post-item__box">
	<div class="post-item__top">
		<?php if ($duration): ?>
			<div class="duration">
				<?php
				$hours = floor($duration / 60);
				$minutes = $duration % 60;
				echo sprintf('%02d:%02d', $hours, $minutes);
				?>
			</div>
		<?php endif; ?>
	</div>
	<div class="post-item__bottom">
		<div class="title">
			<?php the_title() ?>
		</div>
		<div class="presenter">
			<?php if ($presenter && is_int($presenter)):
				$presenter_post = get_post($presenter);
				if ($presenter_post):
					$presenter_link = get_permalink($presenter_post->ID);
			?>
					<div>with
						<?php echo esc_html($presenter_post->post_title); ?>
					</div>
			<?php
				endif;
			endif; ?>
		</div>
	</div>
</div>
</a>