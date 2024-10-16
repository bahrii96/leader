(function ($) {
    $(document).ready(function () {
        var currentCategory = 'all';
        var offset = 0;
        var postsPerPage = 12;

        function loadPodcastsByCategory(categoryId) {
            $.ajax({
                type: 'POST',
                url: my_ajax_object.ajaxurl,
                data: {
                    action: 'load_podcasts_by_category',
                    category_id: categoryId,
                    offset: offset,
                    posts_per_page: postsPerPage,
                },
                success: function (response) {
                    $('#posts-container').html(response.data.html);
                    offset += postsPerPage;
                },
                error: function (xhr, status, error) {
                    console.log('Error: ' + error);
                },
            });
        }

        $('.category-link').on('click', function (e) {
            e.preventDefault();
            $('.category-link').removeClass('active');
            $(this).addClass('active');
            currentCategory = $(this).data('category-id');
            offset = 0;
            loadPodcastsByCategory(currentCategory);
        });

        $('#mobile-category-select').on('change', function () {
            currentCategory = $(this).val();
            offset = 0;
            loadPodcastsByCategory(currentCategory);
        });

        var swiper = new Swiper('.popular__swiper', {
            slidesPerView: 1.2,
            spaceBetween: 8,
            breakpoints: {
                998: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
            },
            navigation: {
                nextEl: '.swiper-next-testimonials',
                prevEl: '.swiper-prev-testimonials',
            },
            autoplay: {
                delay: 4000,
            },
            loop: true,
            speed: 1000,
        });

        var swiper = new Swiper('.popular__swiper-more', {
            slidesPerView: 1.2,
            spaceBetween: 8,
            breakpoints: {
                998: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
            },
            navigation: {
                nextEl: '.swiper-next-testimonials-more',
                prevEl: '.swiper-prev-testimonials-more',
            },
            autoplay: {
                delay: 4000,
            },
            loop: true,
            speed: 1000,
				});
			
			
			
					     $('#presenter-select').on('change', function () {
                             var presenterId = $(this).val();

                             $.ajax({
                                 type: 'POST',
                                 url: my_ajax_object.ajaxurl, // URL для AJAX запитів у WordPress
                                 data: {
                                     action:'filter_podcasts_by_presenter',
                                     presenter_id: presenterId,
                                 },
                                 success: function (response) {
                                     if (response.success) {
                                         $('#posts-container').html(response.data.html); // Оновлюємо список відео
                                     } else {
                                         console.log(response.data.message);
                                     }
                                 },
                                 error: function (xhr, status, error) {
                                     console.log('Status: ' + status);
                                     console.log('Error: ' + error);
                                     console.log(xhr.responseText);
                                 },
                             });
                         });
			
    });
})(jQuery);



