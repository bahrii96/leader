<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<?php $mainpath = get_stylesheet_directory_uri(); ?>

	<meta charset="utf-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<link rel="stylesheet" href="<?php echo $mainpath; ?>/assets/fonts/font-awesome/css/all.min.css">
	<meta charset="<?php bloginfo('charset'); ?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,regular,500,600,700,800,900," rel="stylesheet" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	$link_first = get_field('link_first', 'options');
	$link_second = get_field('link_second', 'options');
	?>
	<header class="header">
		<div class="container">
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
			<span class="menu-toggle">
				<small></small>
			</span>
			<nav>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary_left',
					'menu_class' => 'main-nav',
					'walker' => new Custom_Walker_Nav_Menu
				));
				?>

				<div class="menu-btn menu-btn-mob">
					<?php
					if ($link_first) :
						$link_url = $link_first['url'];
						$link_title = $link_first['title'];
						$link_target = $link_first['target'] ? $link_first['target'] : '_self';
					?>
						<a class="btn"  href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"> <span></span><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</nav>
			<div class="menu-btn menu-btn-desc">
				<?php
				if ($link_first) :
					$link_url = $link_first['url'];
					$link_title = $link_first['title'];
					$link_target = $link_first['target'] ? $link_first['target'] : '_self';
				?>
					<a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"> <span></span><?php echo esc_html($link_title); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</header>