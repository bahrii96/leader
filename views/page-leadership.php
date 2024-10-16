<?php /* Template name: Leadership Page */
get_header();
$leadership_book = get_field('leadership_book');

if ($leadership_book) {
	$hero_group = $leadership_book['hero_group'];
	$about_group = $leadership_book['about_group'];
	$testimonials_group = $leadership_book['testimonials_group'];
};
?>
<main>
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$image = $hero_group['image'];
		$caption = $hero_group['caption'];
		$title = $hero_group['title'];
		$description = $hero_group['description'];
		$button = $hero_group['button'];
	?>
		<section class="hero-block">
			<div class="hero-block__overlay" style="background-image: url(<?php echo $overlay['url'] ?>);">
			</div>
			<div class="container">
				<div class="hero-block__left">
					<?php if ($caption) : ?>
						<span class="hero-block__caption" data-aos="fade-up" data-aos-delay="450"><?php echo $caption ?></span>
					<?php endif; ?>
					<?php if ($title) : ?>
						<h1 class="title" data-aos="fade-up" data-aos-delay="500"><?php echo $title ?></h1>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="hero-block__desc desc" data-aos="fade-up" data-aos-delay="550">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
					<?php if ($button) : ?>
						<div class="hero-block__btn" data-aos="fade-up" data-aos-delay="600">
							<?php echo initLinkHref($button, 'btn') ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="hero-block__right" data-aos="fade-up" data-aos-delay="600">
					<?php if ($image): ?>
						<?php echo wp_get_attachment_image($image, 'full'); ?>
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
	?>
		<section class="about-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="about-block__group">
					<?php if ($image) : ?>
						<div class="about-block__img" data-aos="fade-up">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
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
				<?php if ($title) : ?>
					<div class="title" data-aos="fade-up">
						<?php echo $title ?>
					</div>
				<?php endif; ?>
				<div class="testimonials-block__box" data-aos="fade-up">
					<div class="swiper  testimonials-block__swiper">
						<div class="swiper-wrapper">
							<?php
							foreach ($list as $item) {
								$testimonial = $item['testimonial'];
								$avatar = $item['avatar'];
								$name = $item['name'];
								$caption = $item['caption'];
							?>
								<div class="swiper-slide">
									<div class="testimonials-block__stars">
										<svg width="34" height="24" viewBox="0 0 34 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M13 12C13 17 11 20 5 23M13 12H3C2.46957 12 1.96086 11.7893 1.58579 11.4142C1.21071 11.0391 1 10.5304 1 10V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H11C11.5304 1 12.0391 1.21071 12.4142 1.58579C12.7893 1.96086 13 2.46957 13 3V12ZM33 12C33 17 31 20 25 23M33 12H23C22.4696 12 21.9609 11.7893 21.5858 11.4142C21.2107 11.0391 21 10.5304 21 10V3C21 2.46957 21.2107 1.96086 21.5858 1.58579C21.9609 1.21071 22.4696 1 23 1H31C31.5304 1 32.0391 1.21071 32.4142 1.58579C32.7893 1.96086 33 2.46957 33 3V12Z" stroke="#FFB200" stroke-width="2" stroke-linecap="round" />
										</svg>

									</div>
									<?php if ($testimonial): ?>
										<div class="testimonials-block__testimonial">
											<?php echo $testimonial ?>
										</div>
									<?php endif; ?>

									<div class="testimonials-block__group">
										<?php if ($avatar): ?>
											<div class="testimonials-block__avatar">
												<?php echo wp_get_attachment_image($avatar, 'full'); ?>
											</div>
										<?php endif; ?>
										<div class="testimonials-block__group-inf">
											<?php if ($name): ?>
												<div class="name">
													<?php echo $name ?>
												</div>
											<?php endif; ?>
											<?php if ($caption): ?>
												<div class="caption">
													<?php echo $caption ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php
							} ?>
						</div>
					</div>
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

			</div>
		</section>
	<?php endif; ?>


</main>
<?php get_footer(); ?>