<?php /* Template name: Contact Page */
get_header();
$contact_page = get_field('contact_page');
$footer_settings = get_field('footer_settings', 'options');
$fourth_group = isset($footer_settings['fourth_group']) ? $footer_settings['fourth_group'] : null;
?>
<main>
	<?php if ($contact_page) :
		$title = $contact_page['title'];
		$caption = $contact_page['caption'];
		$image = $contact_page['image'];
		$form_title = $contact_page['form_title'];
		$form_shortcode = $contact_page['form_shortcode'];

	?>
		<section class="contact-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="contact-block__left">
					<?php if ($caption) : ?>
						<h1 class="title" data-aos="fade-up"><?php echo $title ?></h1>
					<?php endif; ?>
					<?php if ($caption) : ?>
						<div class="contact-block__desc desc" data-aos="fade-up">
							<?php echo $caption ?>
						</div>
					<?php endif; ?>
					<?php if ($image): ?>
						<div class="contact-block__img" data-aos="fade-up">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="contact-block__right" data-aos="fade-up">
					<?php if ($form_title): ?>
						<div class="contact-block__right-title">
							<?php echo $form_title ?>
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