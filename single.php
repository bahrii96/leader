<?php get_header(); ?>
<main>
	<div class="single-block">
		<div class="container">
			<div class="single-block__box">
				<?php
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>


						<h1><?php the_title(); ?></h1>

						<?php
						$course_id = get_the_ID();
						$lessons = learndash_get_course_steps_count($course_id);
						?>
						<?php if ($lessons > 0): ?>
							<div class="ld-course-lessons-count">
								<?php echo $lessons . ' Lessons'; ?>
							</div>
						<?php endif; ?>



						<div class="post-content">
							<?php the_content(); ?>
						</div>


						<?php the_post_navigation(); ?>

						<?php comments_template(); ?>

				<?php endwhile;
				endif;
				?>

			</div>
			<div class="ld-profile">
				<?php echo do_shortcode('[ld_profile]'); ?>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>