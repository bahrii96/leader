(function ($) {
    $(document).ready(function () {
        var currentCategory = 'all';
        var offset = 0;
        var postsPerPage = 12;

        function loadVideosByCategory(categoryId) {
            $.ajax({
                type: 'POST',
                url: my_ajax_object.ajaxurl,
                data: {
                    action: 'load_courses_by_category',
                    category_id: categoryId,
                    offset: offset,
                    posts_per_page: postsPerPage,
                },
                success: function (response) {
                    $('#posts-container').html(response.data.html);
                    offset += postsPerPage;
                },
                error: function (xhr, status, error) {
                    console.log('Status: ' + status);
                    console.log('Error: ' + error);
                    console.log(xhr.responseText);
                },
            });
        }

  $('.category-link').on('click', function (e) {
      e.preventDefault();
      $('.category-link').removeClass('active');
      $(this).addClass('active');
      currentCategory = $(this).data('category-id'); 
      offset = 0; 
      loadVideosByCategory(currentCategory); // Завантажуємо відео
  });
        $('#mobile-category-select').on('change', function () {
            currentCategory = $(this).val();
            offset = 0;
            loadVideosByCategory(currentCategory);
				});
			
			
			$('#search-button').on('click', function () {
                var searchTerm = $('#search-input').val();
                offset = 0;
                loadCoursesBySearch(searchTerm, currentCategory);
            });

            function loadCoursesBySearch(searchTerm, categoryId) {
                $.ajax({
                    type: 'POST',
                    url: my_ajax_object.ajaxurl,
                    data: {
                        action: 'load_courses_by_search',
                        search_term: searchTerm,
                        category_id: categoryId,
                        offset: offset,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        $('#posts-container').html(response.data.html);
                        offset += postsPerPage;
                    },
                    error: function (xhr, status, error) {
                        console.log('Status: ' + status);
                        console.log('Error: ' + error);
                        console.log(xhr.responseText);
                    },
                });
            }

    });
})(jQuery);






