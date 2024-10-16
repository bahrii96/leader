<?php
$footer_settings = get_field('footer_settings', 'options');
if ($footer_settings) {

	$first_group = isset($footer_settings['first_group']) ? $footer_settings['first_group'] : null;

	$second_group = isset($footer_settings['second_group']) ? $footer_settings['second_group'] : null;
	$third_group = isset($footer_settings['third_group']) ? $footer_settings['third_group'] : null;
	$fourth_group = isset($footer_settings['fourth_group']) ? $footer_settings['fourth_group'] : null;
	$footer_bottom_group = isset($footer_settings['footer_bottom_group']) ? $footer_settings['footer_bottom_group'] : null;
	$subscribe_group = isset($footer_settings['subscribe_group']) ? $footer_settings['subscribe_group'] : null;
}
?>
<?php if ($subscribe_group) :
	$subscriptions_title = $subscribe_group['title'];
	$caption = $subscribe_group['caption'];
	$shortcode_form = $subscribe_group['shortcode_form'];
?>
	<section class="subscribe-block" data-aos="fade-up">
		<div class="container">
			<div class="subscribe-block__box">
				<div class="subscribe-block__box-left">
					<?php if ($subscriptions_title) : ?>
						<div class="title" data-aos="fade-up"><?php echo $subscriptions_title ?></div>
					<?php endif; ?>
					<?php if ($caption): ?>
						<div class="desc" data-aos="fade-up"><?php echo $caption ?></div>
					<?php endif; ?>
				</div>
				<?php if ($shortcode_form) : ?>
					<div class="subscribe-block__form form" data-aos="fade-up">
						<?php echo do_shortcode($shortcode_form); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<footer class="footer">
	<div class="container">
		<div class="footer__top">
			<?php if ($first_group) :
				$description = $first_group['description'];
			?>
				<div class="footer__first">
					<a href="<?php echo home_url('/'); ?>" class="logo" aria-label="Site Logo">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo_site');
						if ($custom_logo_id) :
							echo wp_get_attachment_image($custom_logo_id, 'full', false, [
								'loading' => 'eager'
							]);
						endif;
						?>
					</a>
					<?php if ($description): ?>
						<div class="footer__first-desc">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="footer__menu-group">

				<?php if ($second_group) :
					$title = $second_group['title'];
					$links = $second_group['links'];
				?>
					<div class="footer__menu">
						<?php if ($title): ?>
							<div class="footer__menu-title">
								<?php echo $title ?>
							</div>
						<?php endif; ?>
						<?php if (is_array($links)): ?>
							<div class="footer__menu-list">
								<?php foreach ($links as $item) {
									$link = $item['link'];
								?>
									<div class="footer__menu-item">
										<?php echo initLinkHref($link, '') ?>
									</div>
								<?php } ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>


				<?php if ($third_group) :
					$title = $third_group['title'];
					$links = $third_group['links'];
				?>
					<div class="footer__menu">
						<?php if ($title): ?>
							<div class="footer__menu-title">
								<?php echo $title ?>
							</div>
						<?php endif; ?>
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
					</div>
				<?php endif; ?>
			</div>
			<?php if ($fourth_group) :
				$title = $fourth_group['title'];
				$links = $fourth_group['links'];
				$socials = $fourth_group['socials'];
				$markets = $fourth_group['markets'];
			?>
				<div class="footer__fourth">
					<?php if ($title): ?>
						<div class="footer__menu-title">
							<?php echo $title ?>
						</div>
					<?php endif; ?>
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
					<?php if (is_array($markets)) : ?>
						<div class="footer__markets">
							<?php
							foreach ($markets as $item) {
								$link = $item['link'];
								$icon = $item['icon'];
							?>
								<a href="<?php echo $link ?>" class="footer__markets-item" target="_blank">
									<div class="footer__markets-item-box">
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
		</div>
		<div class="footer__bottom">

			<?php if ($footer_bottom_group) :
				$caption = $footer_bottom_group['caption'];
				$links = $footer_bottom_group['links'];
			?>
				<div class="footer__bottom-menu">

					<?php if (is_array($links)): ?>
						<?php foreach ($links as $item) {
							$link = $item['link'];
						?>
							<div class="footer__bottom-item">
								<?php echo initLinkHref($link, '') ?>
							</div>
						<?php } ?>

					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($caption): ?>
				<div class="footer__bottom-caption">
					<?php echo $caption ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</footer>
<?php
wp_footer();
?>
</body>

</html>