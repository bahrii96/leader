<?php /* Template name: Courses Individual Page */
get_header();
$individual_courses_page = get_field('individual_courses_page');

if ($individual_courses_page) {
	$hero_group = $individual_courses_page['hero_group'];
	$about_group = $individual_courses_page['about_group'];
	$testimonials_group = $individual_courses_page['testimonials_group'];
	$subscriptions_group = $individual_courses_page['subscriptions_group'];
	$form_group = $individual_courses_page['form_group'];
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


	<?php if ($about_group) :
		$block_id = $about_group['block_id'];
		$more_description = $about_group['more_description'];
		$title = $about_group['title'];
		$description = $about_group['description'];
		$link = $about_group['link'];
	?>
		<section class="about-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="about-block__box">
					<?php if ($title) : ?>
						<h2 class="title" data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="about-block__desc desc" data-aos="fade-up">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
					<?php if ($more_description) : ?>
						<div class="about-block__desc-more desc" data-aos="fade-up">
							<?php echo $more_description ?>
						</div>
					<?php endif; ?>
					<?php if ($link): ?>
						<div class="about-block__btn" data-aos="fade-up">
							<?php echo initLinkHref($link, 'btn') ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($testimonials_group) :
		$title = $testimonials_group['title'];
		$list = $testimonials_group['list'];
		$block_id = $testimonials_group['block_id'];
	?>
		<section class="testimonials-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="testimonials-block__top" data-aos="fade-up">
					<?php if ($title) : ?>
						<h2 class="title">
							<?php echo $title ?>
						</h2>
					<?php endif; ?>
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
				<div class="testimonials-block__box" data-aos="fade-up">
					<div class="swiper-pagination"></div>
					<div class="swiper  testimonials-image__swiper">
						<div class="swiper-wrapper">
							<?php
							foreach ($list as $item) {
								$image = $item['image'];
								$caption = $item['caption'];
							?>
								<div class="swiper-slide">
									<?php if ($image): ?>
										<div class="grid-image" data-fancybox="gallery" data-src="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>">
											<?php echo wp_get_attachment_image($image, 'full'); ?>
										</div>
									<?php endif; ?>
									<?php if ($caption): ?>
										<div class="swiper-slide-caption desc">
											<?php echo $caption ?>
										</div>
									<?php endif; ?>
								</div>
							<?php
							} ?>
						</div>
					</div>

				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($subscriptions_group) :
		$block_id = $subscriptions_group['block_id'];
		$title = $subscriptions_group['title'];
		$description = $subscriptions_group['description'];
		$link = $subscriptions_group['link'];
		$subscriptions_list = $subscriptions_group['subscriptions_list'];
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
					<?php if ($link) : ?>
						<div class="subscriptions-block__btn" data-aos="fade-up"><?php echo initLinkHref($link, 'btn') ?></div>
					<?php endif; ?>
				</div>
				<?php if (is_array($subscriptions_list)): ?>
					<div class="subscriptions-block__list">
						<?php foreach ($subscriptions_list as $item) {
							$type = $item['type'];
							$title = $item['title'];
							$price = $item['price'];
							$caption = $item['caption'];
							$benefits = $item['benefits'];
							$button = $item['button'];
						?>
							<div class="subscriptions-block__item" data-aos="fade-up">
								<?php if ($type): ?>
									<div class="type">
										<?php echo $type ?>
									</div>
								<?php endif; ?>
								<?php if ($title): ?>
									<h3><?php echo $title ?></h3>
								<?php endif; ?>
								<?php if ($price): ?>
									<div class="price"><?php echo $price ?></div>
								<?php endif; ?>
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

			</div>
		</section>
	<?php endif; ?>



	<?php
	$contact_page = get_field('contact_page');
	$footer_settings = get_field('footer_settings', 'options');
	$fourth_group = isset($footer_settings['fourth_group']) ? $footer_settings['fourth_group'] : null;
	if ($form_group) :

		$block_id = $form_group['block_id'];
		$title_form = $form_group['title_form'];
		$form_shortcode = $form_group['form_shortcode'];

	?>
		<section class="contact-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="contact-block__box" data-aos="fade-up">
					<?php if ($title_form): ?>
						<div class="contact-block__box-title">
							<?php echo $title_form ?>
						</div>
					<?php endif; ?>

					<?php if ($fourth_group) :
						$links = $fourth_group['links'];
						$socials = $fourth_group['socials'];
					?>
						<div class="footer__fourth">

							<?php if (is_array($links)): ?>
								<div class="footer__menu-list">
									<?php foreach ($links as $item) {
										$link = $item['link'];
									?>
										<div class="footer__menu-item">
											<?php echo initLinkHref($link) ?>
										</div>
									<?php } ?>
								</div>
							<?php endif; ?>

							<?php if (is_array($socials)) : ?>
								<div class="footer__socials">
									<?php
									foreach ($socials as $item) {
										$link = $item['link'];
										$icon = $item['icon'];
									?>
										<a href="<?php echo $link ?>" class="footer__socials-item" target="_blank">
											<div class="footer__socials-item-box">
												<?php if ($icon) : ?>
													<?php echo wp_get_attachment_image($icon, 'full'); ?>
												<?php endif; ?>
											</div>
										</a>
									<?php
									} ?>
								</div>
							<?php endif; ?>

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