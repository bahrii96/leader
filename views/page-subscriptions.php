<?php /* Template name: Subscriptions Page */
get_header();
$subscriptions_page = get_field('subscriptions_page');

if ($subscriptions_page) {
	$hero_group = $subscriptions_page['hero_group'];
	$subscriptions_group = $subscriptions_page['subscriptions_group'];
	$gallery_group = $subscriptions_page['gallery_group'];
	$benefit_group = $subscriptions_page['benefit_group'];
	$about_group = $subscriptions_page['about_group'];
	$form_group = $subscriptions_page['form_group'];
};
?>
<main>
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$description = $hero_group['description'];
		$link = $hero_group['link'];
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
				<?php if ($link) : ?>
					<div class="hero-block__btn" data-aos="fade-up" data-aos-delay="600">
						<?php echo initLinkHref($link, 'btn') ?>
					</div>
				<?php endif; ?>

			</div>
		</section>
	<?php endif; ?>


	<?php if ($subscriptions_group) :
		$block_id = $subscriptions_group['block_id'];
		$title = $subscriptions_group['title'];
		$description = $subscriptions_group['description'];
		$subscriptions_list = $subscriptions_group['subscriptions_list'];
		$caption_bottom = $subscriptions_group['caption_bottom'];
	?>
		<section class="subscriptions-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="subscriptions-block__inf">
					<?php if ($title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="subscriptions-block__desc" data-aos="fade-up"><?php echo $description ?></div>
					<?php endif; ?>
				</div>

				<?php if (is_array($subscriptions_list)): ?>
					<div class="subscriptions-block__list">
						<?php foreach ($subscriptions_list as $item) {
							$best = $item['best'];
							$title = $item['title'];
							$price = $item['price'];
							$duration = $item['duration'];
							$caption = $item['caption'];
							$benefits = $item['benefits'];
							$button = $item['button'];
						?>
							<div class="subscriptions-block__item" data-aos="fade-up">
								<?php if ($best): ?>
									<div class="best">
										Best Value
									</div>
								<?php endif; ?>
								<?php if ($title): ?>
									<h3><?php echo $title ?></h3>
								<?php endif; ?>
								<div class="price-box">
									<?php if ($price): ?>
										<div class="price"><?php echo $price ?></div>
									<?php endif; ?>
									<?php if ($duration): ?>
										<div class="duration"><?php echo $duration ?></div>
									<?php endif; ?>
								</div>

								<?php if ($caption): ?>
									<div class="caption"><?php echo $caption ?></div>
								<?php endif; ?>

								<?php if (is_array($benefits)): ?>
									<div class="benefits">
										<?php foreach ($benefits as $item) {
											$caption = $item['caption'];
										?>
											<div class="benefits-item">
												<?php echo $caption ?>
											</div>
										<?php } ?>
									</div>
								<?php endif; ?>
								<?php if ($button): ?>
									<div class="button-box">
										<?php echo initLinkHref($button, 'btn') ?>
									</div>
								<?php endif; ?>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>
				<?php if ($caption_bottom): ?>
					<div class="subscriptions-block__bottom" data-aos="fade-up">
						<?php echo $caption_bottom ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($gallery_group) :
		$block_id = $gallery_group['block_id'];
		$title = $gallery_group['title'];
		$caption = $gallery_group['caption'];
		$image = $gallery_group['image'];
		$image_mobile = $gallery_group['image_mobile'];
		$description_left = $gallery_group['description_left'];
		$description_right = $gallery_group['description_right'];
	?>
		<section class="gallery-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="gallery-block__top">
					<?php if ($title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($caption) : ?>
						<div class="gallery-block__caption" data-aos="fade-up">
							<div class="gallery-block__caption-box">
								<?php echo $caption ?>
							</div>

						</div>
					<?php endif; ?>
				</div>
				<?php if ($image) : ?>
					<div class="gallery-block__img" data-aos="fade-up">
						<?php echo wp_get_attachment_image($image, 'full'); ?>
					</div>
				<?php endif; ?>
				<?php if ($image_mobile) : ?>
					<div class="gallery-block__img-mob" data-aos="fade-up">
						<?php echo wp_get_attachment_image($image_mobile, 'full'); ?>
					</div>
				<?php endif; ?>
				<div class="gallery-block__box">
					<?php if ($description_left) : ?>
						<div class="gallery-block__desc-left" data-aos="fade-up">
							<?php echo $description_left ?>
						</div>
					<?php endif; ?>
					<?php if ($description_right) : ?>
						<div class="gallery-block__desc-right" data-aos="fade-up">
							<?php echo $description_right ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($benefit_group) :
		$title = $benefit_group['title'];
		$list = $benefit_group['list'];
		$block_id = $benefit_group['block_id'];
	?>
		<section class="benefit-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2 class="title" data-aos="fade-up">
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="benefit-block__list">
					<?php if (is_array($list)): ?>


						<?php foreach ($list as $item) {
							$icon = $item['icon'];
							$title = $item['title'];
							$description = $item['description'];
						?>
							<div class="benefit-block__item" data-aos="fade-up">
								<?php if ($icon): ?>
									<div class="benefit-block_icon">
										<?php echo wp_get_attachment_image($icon, 'full'); ?>
									</div>
								<?php endif; ?>
								<?php if ($title): ?>
									<h3><?php echo $title ?></h3>
								<?php endif; ?>
								<?php if ($description): ?>
									<div class="testimonials-block__desc">
										<?php echo $description ?>
									</div>
								<?php endif; ?>

							</div>
						<?php
						} ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>


	<?php if ($about_group) :
		$block_id = $about_group['block_id'];
		$image = $about_group['image'];
		$title = $about_group['title'];
		$description = $about_group['description'];
		$link = $about_group['link'];
		$link_second = $about_group['link_second'];
	?>
		<section class="about-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="about-block__left">
					<?php if ($title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="about-block__desc desc" data-aos="fade-up">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
					<div class="about-block__btn-box">
						<?php if ($link): ?>
							<div class="about-block__btn" data-aos="fade-up">
								<?php echo initLinkHref($link, 'btn') ?>
							</div>
						<?php endif; ?>
						<?php if ($link_second): ?>
							<div class="about-block__btn" data-aos="fade-up">
								<?php echo initLinkHref($link_second, 'btn-tr') ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ($image) : ?>
					<div class="about-block__img" data-aos="fade-up">
						<?php echo wp_get_attachment_image($image, 'full'); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>


	<?php if ($form_group) :
		$block_id = $form_group['block_id'];
		$title_form = $form_group['title_form'];
		$form_shortcode = $form_group['form_shortcode'];
		$title = $form_group['title'];
		$description = $form_group['description'];
	?>
		<section class="contact-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="contact-block__left">
					<?php if ($title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="contact-block__desc desc" data-aos="fade-up">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="contact-block__right" data-aos="fade-up">
					<?php if ($title_form): ?>
						<div class="contact-block__right-title">
							<?php echo $title_form ?>
						</div>
					<?php endif; ?>
					<?php if ($form_shortcode) : ?>
						<div class="contact-block__form form">
							<?php echo do_shortcode($form_shortcode); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>
<?php get_footer(); ?>