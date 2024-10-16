<?php get_header(); ?>


<main>

	<section class="single-block">
		<div class="container">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="single-block__top">
							<div class="post-category" data-aos="fade-up">
								<?php
								$categories = get_the_category();
								if (!empty($categories)) {
									foreach ($categories as $category) {
										echo esc_html($category->name); // Виводимо назву категорії без посилання
									}
								}
								?>
							</div>
							<div class="post-date" data-aos="fade-up">
								<?php echo get_the_date(); ?>
							</div>
						</div>
						<h1 class="post-title" data-aos="fade-up">
							<?php the_title(); ?>
						</h1>
						<!-- Featured Image -->
						<div class="post-thumbnail" data-aos="fade-up">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('full'); ?>
							<?php endif; ?>
						</div>
						<div class="single-block__box">
							<div class="single-block__box-meta" data-aos="fade-up">
								<div class="post-author">
									<span> Written by:</span>
									<?php the_author(); ?>
								</div>
								<div class="post-date">
									<span>Published on: </span>
									<?php echo get_the_date(); ?>
								</div>
							</div>
							<div class="share-box">
								<div class="copy-link" data-aos="fade-up">
									<button onclick="copyLink()"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_197_5280)">
												<path d="M4.16797 12.5H3.33464C2.89261 12.5 2.46868 12.3244 2.15612 12.0118C1.84356 11.6992 1.66797 11.2753 1.66797 10.8333V3.33329C1.66797 2.89127 1.84356 2.46734 2.15612 2.15478C2.46868 1.84222 2.89261 1.66663 3.33464 1.66663H10.8346C11.2767 1.66663 11.7006 1.84222 12.0131 2.15478C12.3257 2.46734 12.5013 2.89127 12.5013 3.33329V4.16663M9.16797 7.49996H16.668C17.5884 7.49996 18.3346 8.24615 18.3346 9.16663V16.6666C18.3346 17.5871 17.5884 18.3333 16.668 18.3333H9.16797C8.24749 18.3333 7.5013 17.5871 7.5013 16.6666V9.16663C7.5013 8.24615 8.24749 7.49996 9.16797 7.49996Z" stroke="#828282" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
											</g>
											<defs>
												<clipPath id="clip0_197_5280">
													<rect width="20" height="20" fill="white" />
												</clipPath>
											</defs>
										</svg>
										Copy link</button>
								</div>
								<div class="social-share" data-aos="fade-up">
									<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank">
										<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="black" stroke-opacity="0.2" />
											<path d="M16.6654 11.6666H10.832L17.7161 20.8454L11.207 28.3332H13.4153L18.7389 22.2091L23.332 28.3333H29.1654L21.9918 18.7685L28.1654 11.6666H25.9571L20.9689 17.4048L16.6654 11.6666ZM24.1654 26.6666L14.1654 13.3333H15.832L25.832 26.6666H24.1654Z" fill="#828282" />
										</svg>

									</a>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
										<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="black" stroke-opacity="0.2" />
											<path d="M21.6654 21.25H23.7487L24.582 17.9166H21.6654V16.25C21.6654 15.3921 21.6654 14.5833 23.332 14.5833H24.582V11.7834C24.3106 11.7473 23.2845 11.6666 22.2011 11.6666C19.939 11.6666 18.332 13.0473 18.332 15.5831V17.9166H15.832V21.25H18.332V28.3333H21.6654V21.25Z" fill="#828282" />
										</svg>

									</a>

									<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
										<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="black" stroke-opacity="0.2" />
											<path d="M15.7826 14.1666C15.7823 14.8452 15.3706 15.4558 14.7416 15.7106C14.1127 15.9653 13.3921 15.8133 12.9196 15.3263C12.4471 14.8392 12.3172 14.1143 12.5909 13.4934C12.8647 12.8725 13.4876 12.4795 14.1659 12.4999C15.0668 12.5269 15.783 13.2653 15.7826 14.1666ZM15.8326 17.0666H12.4993V27.4999H15.8326V17.0666ZM21.0993 17.0666H17.7826V27.4999H21.0659V22.0249C21.0659 18.9749 25.0409 18.6915 25.0409 22.0249V27.4999H28.3326V20.8915C28.3326 15.7499 22.4493 15.9416 21.0659 18.4665L21.0993 17.0666Z" fill="#828282" />
										</svg>

									</a>
								</div>
							</div>
						</div>
						<div class="post-content" data-aos="fade-up">
							<?php the_content(); ?>
						</div>

					</article>

					<script>
						function copyLink() {
							var tempInput = document.createElement("input");
							tempInput.value = window.location.href;
							document.body.appendChild(tempInput);
							tempInput.select();
							document.execCommand("copy");
							document.body.removeChild(tempInput);
							alert("Link copied to clipboard!");
						}
					</script>

			<?php endwhile;
			endif; ?>
		</div>

	</section>





</main>





<?php get_footer(); ?>