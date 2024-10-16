(function ($) {
    $(document).ready(function () {
        if ($('.page-template-page-news').length) {
            var currentCategory = 'all';
            var offset = 0;
            var postsPerPage = 12;

            function loadPostsByCategory(categoryId) {
                $.ajax({
                    type: 'POST',
                    url: my_ajax_object.ajaxurl, // Додається через wp_localize_script
                    data: {
                        action: 'load_posts_by_category',
                        category_id: categoryId,
                        offset: offset,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        $('#posts-container').html(response.data.html); // Завантажуємо пости
                        offset += postsPerPage;
                        if (response.data.html === '' || response.data.html.split('<a').length - 1 < postsPerPage) {
                            $('#load-more-posts').hide();
                        } else {
                            $('#load-more-posts').show();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('Error: ' + error);
                    },
                });
            }

            // Для кліку на категорії
            $('.category-link').on('click', function (e) {
                e.preventDefault();
                $('.category-link').removeClass('active');
                $(this).addClass('active');
                currentCategory = $(this).data('category-id');
                offset = 0;
                loadPostsByCategory(currentCategory);
            });

            // Для мобільного select
            $('#mobile-category-select').on('change', function () {
                currentCategory = $(this).val();
                offset = 0;
                loadPostsByCategory(currentCategory);
            });

            // Для кнопки "Load more"
            $('#load-more-posts').on('click', function (e) {
                e.preventDefault();
                loadPostsByCategory(currentCategory);
            });
            console.log('44');
        }
    });
})(jQuery);

