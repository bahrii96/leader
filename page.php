<?php
get_header();
?>
<main class="text-page">
	<section class="hero-block">
		<div class="container">
			<h1><?php the_title() ?></h1>
		</div>
	</section>
	<section class="content desc default">
		<div class="container">
			<div class="content__box">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>