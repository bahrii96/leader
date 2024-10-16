<?php /* Template name: Subscription Page */
get_header();
$subscription_page = get_field('subscription_page');

if ($subscription_page) {
	$hero_group = $subscription_page['hero_group'];
	$about_group = $subscription_page['about_group'];
	$form_group = $subscription_page['form_group'];
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
						<div class="title" data-aos="fade-up"><?php echo $title ?></div>
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