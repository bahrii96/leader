<?php /* Template name: Quiz Page */
get_header();
$first_group_questions = get_field('first_group_questions', 'options');
$second_group_questions = get_field('second_group_questions', 'options');
$y_axis_name = get_field('y_axis_name', 'options');
$x_axis_name = get_field('x_axis_name', 'options');
$quadrant_1 = get_field('quadrant_1', 'options');
$quadrant_name_1 = $quadrant_1['quadrant_name'];
$quadrant_description_1 = $quadrant_1['quadrant_description'];
$quadrant_2 = get_field('quadrant_2', 'options');
$quadrant_name_2 = $quadrant_2['quadrant_name'];
$quadrant_description_2 = $quadrant_2['quadrant_description'];
$quadrant_3 = get_field('quadrant_3', 'options');
$quadrant_name_3 = $quadrant_3['quadrant_name'];
$quadrant_description_3 = $quadrant_3['quadrant_description'];
$quadrant_4 = get_field('quadrant_4', 'options');
$quadrant_name_4 = $quadrant_4['quadrant_name'];
$quadrant_description_4 = $quadrant_4['quadrant_description'];
$quadrant_result_intro = get_field('quadrant_result_intro', 'options');
$quadrant_result_outro = get_field('quadrant_result_outro', 'options');

$quiz_page = get_field('quiz_page');

if ($quiz_page) {
	$hero_group = $quiz_page['hero_group'];
	$about_group = $quiz_page['about_group'];
	$faq_group = $quiz_page['faq_group'];
	$step_group = $quiz_page['step_group'];
};
?>
<main class="generic">

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

	<?php if ($about_group) :
		$block_id = $about_group['block_id'];
		$image = $about_group['image'];
		$title = $about_group['title'];
		$description = $about_group['description'];
	?>
		<section class="about-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="about-block__group">
					<div class="about-block__right">
						<?php if ($title) : ?>
							<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
						<?php endif; ?>
						<?php if ($description) : ?>
							<div class="about-block__desc desc" data-aos="fade-up">
								<?php echo $description ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($image) : ?>
						<div class="about-block__img" data-aos="fade-up">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="flexible-content leader-type-quiz  module-3" data-aos="fade-up">
		<div class="container">
			<div class="leader-type-quiz-container">
				<div id="quiz-questions" class="all-questions">
					<div class="question-group-area">

						<?php if (is_array($first_group_questions)): ?>
							<?php foreach ($first_group_questions as $index => $item) {
								$question = $item['question'];
								$answer_1 = $item['answer_1'];
								$answer_2 = $item['answer_2'];
								// Генеруємо унікальний ідентифікатор для кожного питання
								$question_id = 'q-' . ($index + 1);
							?>
								<div class="question-group" data-axis="Y">
									<h5><span><?php echo ($index + 1); ?>.</span> <?php echo $question; ?> </h5>
									<div>
										<div class="question-options">
											<label>
												<input type="radio" name="<?php echo $question_id; ?>" value="0" data-axis="Y">
												<?php echo $answer_1; ?>
											</label>
											<input type="radio" name="<?php echo $question_id; ?>" value="1" data-axis="Y">
											<input type="radio" name="<?php echo $question_id; ?>" value="2" data-axis="Y">
											<label>
												<input type="radio" name="<?php echo $question_id; ?>" value="3" data-axis="Y">
												<?php echo $answer_2; ?>
											</label>
										</div>
										<div class="question-slider-area">
											<div class="question-slider-half-dots"></div>
											<div class="question-slider-bg" data-que-bg="<?php echo $question_id; ?>"></div>
											<div class="question-slider centered ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-que="<?php echo $question_id; ?>">
												<div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 50%;"></div>
												<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 50%;"></span>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php endif; ?>
						<?php if (is_array($second_group_questions)): ?>
							<?php foreach ($second_group_questions as $index => $item) {
								$question = $item['question'];
								$answer_1 = $item['answer_1'];
								$answer_2 = $item['answer_2'];
								$question_id = 'q-' . (16 + $index + 1);
							?>
								<div class="question-group" data-axis="X">
									<h5><span><?php echo (16 + $index + 1); ?>.</span> <?php echo $question; ?> </h5>
									<div>
										<div class="question-options">
											<label>
												<input type="radio" name="<?php echo $question_id; ?>" value="0" data-axis="X">
												<?php echo $answer_1; ?>
											</label>
											<input type="radio" name="<?php echo $question_id; ?>" value="1" data-axis="X">
											<input type="radio" name="<?php echo $question_id; ?>" value="2" data-axis="X">
											<label>
												<input type="radio" name="<?php echo $question_id; ?>" value="3" data-axis="X">
												<?php echo $answer_2; ?>
											</label>
										</div>
										<div class="question-slider-area">
											<div class="question-slider-half-dots"></div>
											<div class="question-slider-bg" data-que-bg="<?php echo $question_id; ?>"></div>
											<div class="question-slider centered ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-que="<?php echo $question_id; ?>">
												<div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 50%;"></div>
												<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 50%;"></span>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php endif; ?>
						<div class="questions-submit ">
							<button class="get-score btn">Submit your answers</button><br>
						</div>

					</div>

				</div>

				<div id="quiz-totals" style="display: none;">
					<div data-axis-figures="X" style="display: none;">
						<input type="hidden" data-group-total="X" value="">
						<input type="hidden" data-group-questions="X" value="">
					</div>
					<div data-axis-figures="Y" style="display: none;">
						<input type="hidden" data-group-total="Y" value="">
						<input type="hidden" data-group-questions="Y" value="">
					</div>

					<div class="leader-type-results">
						<div class="quadrants" style="--x-label: '<?php echo $x_axis_name ?>'; --y-label: '<?php echo $y_axis_name ?>';">
							<div class="quadrant" data-quadrant="1">
								<h3><?php echo $quadrant_name_1 ?></h3>
								<div class="quadrant-description">
									<p><?php echo $quadrant_description_1 ?></p>
								</div>
							</div>
							<div class="quadrant" data-quadrant="2">
								<h3><?php echo $quadrant_name_2 ?></h3>
								<div class="quadrant-description">
									<p><?php echo $quadrant_description_2 ?></p>
								</div>
							</div>
							<div class="quadrant" data-quadrant="3">
								<h3><?php echo $quadrant_name_3 ?></h3>
								<div class="quadrant-description">
									<p><?php echo $quadrant_description_3 ?></p>
								</div>
							</div>
							<div class="quadrant" data-quadrant="4">
								<h3><?php echo $quadrant_name_4 ?></h3>
								<div class="quadrant-description">
									<p><?php echo $quadrant_description_4 ?></p>
								</div>
							</div>
							<span></span>
						</div>
					</div>

					<div class="your-quadrant-intro">
						<p><?php echo $quadrant_result_intro ?></p>
					</div>
					<div id="your-quadrant"></div>
					<hr>
					<div class="your-quadrant-outro">
						<?php echo $quadrant_result_outro ?>
					</div>
					<hr>
					<div class="restart-questions">
						<button class="secondary btn-small btn" data-restart="1">Restart</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if ($faq_group) :
		$title = $faq_group['title'];
		$list = $faq_group['list'];
		$block_id = $faq_group['block_id'];
	?>
		<section class="question-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<div data-aos="fade-up">
						<?php echo $title ?>
					</div>
				<?php endif; ?>
				<div class="question-block__group">
					<div class="question-block__list" role="description" id="accordion">
						<?php
						$counter = 1;
						foreach ($list as $key => $item) {
							$title = $item['title'];
							$description = $item['description'];
						?>
							<div class="group question-block__item" data-aos="fade-up">
								<h3>
									<div class="question-block__item-group">
										<div class="counter">
											0<?php echo $counter ?>.
										</div>
										<?php echo $title ?>
									</div>
									<div class="question-block__btn"></div>
								</h3>
								<div role="description" class="group question-block__item-desc description">
									<p><?php echo $description ?></p>
								</div>
							</div>
						<?php
							$counter++;
						} ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($step_group) :
		$block_id = $step_group['block_id'];
		$image = $step_group['image'];
		$title = $step_group['title'];
		$description = $step_group['description'];
		$link = $step_group['link'];
	?>
		<section class="about-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="about-block__group">
					<div class="about-block__right">
						<?php if ($title) : ?>
							<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
						<?php endif; ?>
						<?php if ($description) : ?>
							<div class="about-block__desc desc" data-aos="fade-up">
								<?php echo $description ?>
							</div>
						<?php endif; ?>
						<?php if ($link): ?>
							<div class="about-block__btn" data-aos="fade-up">
								<?php echo initLinkHref($link, 'btn') ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($image) : ?>
						<div class="about-block__img" data-aos="fade-up">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>