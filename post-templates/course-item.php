<?php
$duration = get_field('duration', $post->ID);
$podcast_thumbnail = get_field('podcast_thumbnail', $post->ID);
$presenter = get_field('presenter', $post->ID);
?>


<div class="ld-course-item" data-aos="fade-up">
	<!-- Виведення featured image -->
	<div class="ld-course-thumbnail">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('large'); ?>
			</a>
		<?php endif; ?>
	</div>

	<div class="ld-course-lessons-count">
		<?php
		$course_id = get_the_ID();
		$lessons = learndash_get_course_steps_count($course_id);
		echo  $lessons . ' Lessons';
		?>
	</div>
	<div class="ld-course-title">
		<?php the_title(); ?>
	</div>
	<div class="ld-course-price">
		<?php
		$price = learndash_get_course_price($course_id);
		if (! empty($price['price'])) {
			echo '£' . $price['price'];
		} else {
			echo 'Free';
		}
		?>
	</div>

	<div class="ld-course-excerpt desc">
		<?php the_excerpt(); ?>

	</div>


	<div class="btn-box">
		<?php if (! empty($price['price'])) : ?>
			<div class="ld-course-pay-button">
				<a href="<?php echo esc_url(learndash_get_step_permalink($course_id)); ?>" class="btn btn-success">Enroll</a>
			</div>
		<?php endif; ?>
		<div class="ld-course-button">
			<a href="<?php the_permalink(); ?>" class="btn btn-more">Read more</a>
		</div>
	</div>
</div>