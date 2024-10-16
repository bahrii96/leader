<?php /* Template name: Courses Page */
get_header();
$courses_page = get_field('courses_page');

if ($courses_page) {
	$hero_group = $courses_page['hero_group'];
	$about_group = $courses_page['about_group'];
	$services_group = $courses_page['services_group'];
	$options_group = $courses_page['options_group'];
	$subscriptions_group = $courses_page['subscriptions_group'];
	$testimonials_group = $courses_page['testimonials_group'];
	$form_group = $courses_page['form_group'];
	$faq_group = $courses_page['faq_group'];
};
?>
<main>
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
				<div class="about-block__left">
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
		</section>
	<?php endif; ?>

	<?php if ($services_group) :
		$accredited = $services_group['accredited'];
		$other = $services_group['other'];
		$block_id = $services_group['block_id'];
	?>
		<section class="services-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="services-block__box">
					<?php if ($accredited):
						$image = $accredited['image'];
						$title = $accredited['title'];
						$description = $accredited['description'];
						$avatar = $accredited['avatar'];
						$name = $accredited['name'];
						$testimonial = $accredited['testimonial'];
					?>
						<div class="services-block-accredited">
							<div class="services-block-accredited__left">
								<?php if ($image): ?>
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								<?php endif; ?>
							</div>
							<div class="services-block-accredited__right">
								<?php if ($title): ?>
									<h2 class="title">
										<?php echo $title ?>
									</h2>
								<?php endif; ?>
								<?php if ($description): ?>
									<div class="services-block-accredited__right-desc desc">
										<?php echo $description ?>
									</div>
								<?php endif; ?>
								<?php if ($name): ?>
									<div class="services-block-accredited__right-group">
										<div class="top">
											<?php if ($avatar): ?>
												<div class="avatar">
													<?php echo wp_get_attachment_image($avatar, 'full'); ?>
												</div>
											<?php endif; ?>

											<?php if ($name): ?>
												<div class="name"><?php echo $name ?></div>
											<?php endif; ?>
										</div>
										<?php if ($testimonial): ?>
											<div class="testimonial"><?php echo $testimonial ?></div>
										<?php endif; ?>

									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


					<?php if ($other):
						$image = $other['image'];
						$title = $other['title'];
						$description = $other['description'];
					?>
						<div class="services-block-other">
							<div class="services-block-other__left">
								<?php if ($title): ?>
									<h2 class="title">
										<?php echo $title ?>
									</h2>
								<?php endif; ?>
								<?php if ($description): ?>
									<div class="services-block-other-desc desc">
										<?php echo $description ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="services-block-other__img">
								<?php if ($image): ?>
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								<?php endif; ?>

							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($options_group) :
		$block_id = $options_group['block_id'];
		$title = $options_group['title'];
		$list = $options_group['list'];
	?>
		<section class="options-block">
			<div class="container">
				<?php if ($title): ?>
					<h2 class="title">
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="options-block__list">
					<?php if (is_array($list)) : ?>
						<?php
						foreach ($list as $item) {
							$icon = $item['icon'];
							$image = $item['image'];
							$caption = $item['caption'];
							$title = $item['title'];
							$description = $item['description'];
							$link = $item['link'];
						?>
							<div class="options-block__item" data-aos="fade-up">
								<?php if ($image): ?>
									<div class="options-block__img">
										<?php echo wp_get_attachment_image($image, 'full'); ?>
										<?php if ($icon): ?>
											<div class="icon">
												<?php echo wp_get_attachment_image($icon, 'full'); ?>
											</div>

										<?php endif; ?>

										<div class="options-block__img-inf">
											<?php if ($caption): ?>
												<div class="caption"><?php echo $caption ?></div>
											<?php endif; ?>
											<?php if ($title): ?>
												<h3><?php echo $title ?></h3>
											<?php endif; ?>
											<?php if ($description): ?>
												<div class="desc"><?php echo $description ?></div>
											<?php endif; ?>
											<?php if ($description): ?>
												<?php echo initLinkHref($link, 'link') ?>
											<?php endif; ?>
										</div>
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

	<?php if ($subscriptions_group) :
		$block_id = $subscriptions_group['block_id'];
		$title = $subscriptions_group['title'];
		$description = $subscriptions_group['description'];
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
										<svg width="124" height="20" viewBox="0 0 124 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_65_89)">
												<path d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.2725 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z" fill="#FFB200" />
											</g>
											<g clip-path="url(#clip1_65_89)">
												<path d="M32.8692 6.1166L27.5525 6.88744L27.4584 6.9066C27.3158 6.94445 27.1859 7.01944 27.0818 7.12394C26.9777 7.22843 26.9032 7.35868 26.8659 7.50137C26.8286 7.64407 26.8299 7.79411 26.8696 7.93616C26.9092 8.07822 26.9859 8.2072 27.0917 8.30994L30.9434 12.0591L30.035 17.3549L30.0242 17.4466C30.0155 17.594 30.0461 17.7411 30.1129 17.8729C30.1797 18.0046 30.2804 18.1162 30.4045 18.1962C30.5286 18.2762 30.6718 18.3218 30.8193 18.3284C30.9669 18.3349 31.1135 18.3021 31.2442 18.2333L35.9992 15.7333L40.7434 18.2333L40.8267 18.2716C40.9643 18.3258 41.1138 18.3424 41.2598 18.3197C41.4059 18.2971 41.5434 18.236 41.658 18.1427C41.7727 18.0494 41.8605 17.9272 41.9124 17.7888C41.9643 17.6504 41.9785 17.5006 41.9534 17.3549L41.0442 12.0591L44.8975 8.3091L44.9625 8.23827C45.0554 8.12391 45.1163 7.98698 45.139 7.84143C45.1617 7.69588 45.1454 7.54692 45.0918 7.40971C45.0382 7.2725 44.9492 7.15196 44.8338 7.06036C44.7184 6.96876 44.5808 6.90938 44.435 6.88827L39.1184 6.1166L36.7417 1.29994C36.6729 1.16038 36.5665 1.04286 36.4344 0.960689C36.3023 0.878514 36.1498 0.834961 35.9942 0.834961C35.8386 0.834961 35.6862 0.878514 35.5541 0.960689C35.422 1.04286 35.3155 1.16038 35.2467 1.29994L32.8692 6.1166Z" fill="#FFB200" />
											</g>
											<g clip-path="url(#clip2_65_89)">
												<path d="M58.8692 6.1166L53.5525 6.88744L53.4584 6.9066C53.3158 6.94445 53.1859 7.01944 53.0818 7.12394C52.9777 7.22843 52.9032 7.35868 52.8659 7.50137C52.8286 7.64407 52.8299 7.79411 52.8696 7.93616C52.9092 8.07822 52.9859 8.2072 53.0917 8.30994L56.9434 12.0591L56.035 17.3549L56.0242 17.4466C56.0155 17.594 56.0461 17.7411 56.1129 17.8729C56.1797 18.0046 56.2804 18.1162 56.4045 18.1962C56.5286 18.2762 56.6718 18.3218 56.8193 18.3284C56.9669 18.3349 57.1135 18.3021 57.2442 18.2333L61.9992 15.7333L66.7434 18.2333L66.8267 18.2716C66.9643 18.3258 67.1138 18.3424 67.2598 18.3197C67.4059 18.2971 67.5434 18.236 67.658 18.1427C67.7727 18.0494 67.8605 17.9272 67.9124 17.7888C67.9643 17.6504 67.9785 17.5006 67.9534 17.3549L67.0442 12.0591L70.8975 8.3091L70.9625 8.23827C71.0554 8.12391 71.1163 7.98698 71.139 7.84143C71.1617 7.69588 71.1454 7.54692 71.0918 7.40971C71.0382 7.2725 70.9492 7.15196 70.8338 7.06036C70.7184 6.96876 70.5808 6.90938 70.435 6.88827L65.1184 6.1166L62.7417 1.29994C62.6729 1.16038 62.5665 1.04286 62.4344 0.960689C62.3023 0.878514 62.1498 0.834961 61.9942 0.834961C61.8386 0.834961 61.6862 0.878514 61.5541 0.960689C61.422 1.04286 61.3155 1.16038 61.2467 1.29994L58.8692 6.1166Z" fill="#FFB200" />
											</g>
											<g clip-path="url(#clip3_65_89)">
												<path d="M84.8692 6.1166L79.5525 6.88744L79.4584 6.9066C79.3158 6.94445 79.1859 7.01944 79.0818 7.12394C78.9777 7.22843 78.9032 7.35868 78.8659 7.50137C78.8286 7.64407 78.8299 7.79411 78.8696 7.93616C78.9092 8.07822 78.9859 8.2072 79.0917 8.30994L82.9434 12.0591L82.035 17.3549L82.0242 17.4466C82.0155 17.594 82.0461 17.7411 82.1129 17.8729C82.1797 18.0046 82.2804 18.1162 82.4045 18.1962C82.5286 18.2762 82.6718 18.3218 82.8193 18.3284C82.9669 18.3349 83.1135 18.3021 83.2442 18.2333L87.9992 15.7333L92.7434 18.2333L92.8267 18.2716C92.9643 18.3258 93.1138 18.3424 93.2598 18.3197C93.4059 18.2971 93.5434 18.236 93.658 18.1427C93.7727 18.0494 93.8605 17.9272 93.9124 17.7888C93.9643 17.6504 93.9785 17.5006 93.9534 17.3549L93.0442 12.0591L96.8975 8.3091L96.9625 8.23827C97.0554 8.12391 97.1163 7.98698 97.139 7.84143C97.1617 7.69588 97.1454 7.54692 97.0918 7.40971C97.0382 7.2725 96.9492 7.15196 96.8338 7.06036C96.7184 6.96876 96.5808 6.90938 96.435 6.88827L91.1184 6.1166L88.7417 1.29994C88.6729 1.16038 88.5665 1.04286 88.4344 0.960689C88.3023 0.878514 88.1498 0.834961 87.9942 0.834961C87.8386 0.834961 87.6862 0.878514 87.5541 0.960689C87.422 1.04286 87.3155 1.16038 87.2467 1.29994L84.8692 6.1166Z" fill="#FFB200" />
											</g>
											<g clip-path="url(#clip4_65_89)">
												<path d="M110.869 6.1166L105.553 6.88744L105.458 6.9066C105.316 6.94445 105.186 7.01944 105.082 7.12394C104.978 7.22843 104.903 7.35868 104.866 7.50137C104.829 7.64407 104.83 7.79411 104.87 7.93616C104.909 8.07822 104.986 8.2072 105.092 8.30994L108.943 12.0591L108.035 17.3549L108.024 17.4466C108.015 17.594 108.046 17.7411 108.113 17.8729C108.18 18.0046 108.28 18.1162 108.404 18.1962C108.529 18.2762 108.672 18.3218 108.819 18.3284C108.967 18.3349 109.114 18.3021 109.244 18.2333L113.999 15.7333L118.743 18.2333L118.827 18.2716C118.964 18.3258 119.114 18.3424 119.26 18.3197C119.406 18.2971 119.543 18.236 119.658 18.1427C119.773 18.0494 119.861 17.9272 119.912 17.7888C119.964 17.6504 119.978 17.5006 119.953 17.3549L119.044 12.0591L122.898 8.3091L122.963 8.23827C123.055 8.12391 123.116 7.98698 123.139 7.84143C123.162 7.69588 123.145 7.54692 123.092 7.40971C123.038 7.2725 122.949 7.15196 122.834 7.06036C122.718 6.96876 122.581 6.90938 122.435 6.88827L117.118 6.1166L114.742 1.29994C114.673 1.16038 114.566 1.04286 114.434 0.960689C114.302 0.878514 114.15 0.834961 113.994 0.834961C113.839 0.834961 113.686 0.878514 113.554 0.960689C113.422 1.04286 113.315 1.16038 113.247 1.29994L110.869 6.1166Z" fill="#FFB200" />
											</g>
											<defs>
												<clipPath id="clip0_65_89">
													<rect width="20" height="20" fill="white" />
												</clipPath>
												<clipPath id="clip1_65_89">
													<rect width="20" height="20" fill="white" transform="translate(26)" />
												</clipPath>
												<clipPath id="clip2_65_89">
													<rect width="20" height="20" fill="white" transform="translate(52)" />
												</clipPath>
												<clipPath id="clip3_65_89">
													<rect width="20" height="20" fill="white" transform="translate(78)" />
												</clipPath>
												<clipPath id="clip4_65_89">
													<rect width="20" height="20" fill="white" transform="translate(104)" />
												</clipPath>
											</defs>
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

	<?php if ($faq_group) :
		$title = $faq_group['title'];
		$list = $faq_group['list'];
		$block_id = $faq_group['block_id'];
	?>
		<section class="question-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2 data-aos="fade-up">
						<?php echo $title ?>
					</h2>
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


</main>
<?php get_footer(); ?>