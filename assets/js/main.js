(function ($) {
    $(document).ready(function () {
        // When the user scrolls the page, execute myFunction

        $('.grid-image').fancybox({
            buttons: ['zoom', 'slideShow', 'fullScreen', 'thumbs', 'close'],
            loop: true,
        });
        window.onscroll = function () {
            myFunction();
        };
        var header = document.querySelector('header');
        var sticky = header.offsetTop;
        function myFunction() {
            if (window.pageYOffset > 30) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        }

        $('#accordion').accordion({
            header: '> div > h3',
            heightStyle: 'content',
            collapsible: true,
        });

        $('.services-block__item:has(.ui-state-active)').addClass('active');

        $('.services-block__item').on('click', function () {
            $('.services-block__item').removeClass('active');

            if ($(this).find('.ui-state-active').length) {
                $(this).addClass('active');
            }
        });

        if ($('.testimonials-image__swiper')) {
            var swiper = new Swiper('.testimonials-image__swiper', {
                slidesPerView: 2,
                spaceBetween: 8,
                breakpoints: {
                    998: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
                },
                navigation: {
                    nextEl: '.swiper-next-testimonials',
                    prevEl: '.swiper-prev-testimonials',
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'progressbar',
                },
                autoplay: {
                    delay: 4000,
                },
                loop: true,
                speed: 1000,
            });
        }
        if ($('.testimonials-block__swiper')) {
            var swiper = new Swiper('.testimonials-block__swiper', {
                slidesPerView: 1.2,
                spaceBetween: 8,
                breakpoints: {
                    767: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    998: {
                        slidesPerView: 3,
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
        }

        if ($('.logos-block__swiper')) {
            var swiper = new Swiper('.logos-block__swiper', {
                slidesPerView: 3,
                spaceBetween: 8,
                breakpoints: {
                    767: {
                        slidesPerView: 6,
                        spaceBetween: 24,
                    },
                    998: {
                        slidesPerView: 8,
                        spaceBetween: 40,
                    },
                },

                autoplay: {
                    delay: 4000,
                },
                loop: true,
                speed: 1000,
            });
        }

        $(document).on('touchstart', function (e) {
            if (!$(e.target).closest('nav').length && !$(e.target).hasClass('menu-toggle')) {
                $('.header .menu-toggle, .header nav').removeClass('is-active');
                $('body').removeClass('is-active');
            }
        });

        $('.header .menu-toggle, .header nav .close').click(function (e) {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        $('.header nav ul li.menu-item-has-children .icon').click(function () {
            const listItem = $(this).parent('li');
            $(this).toggleClass('rotate');
            listItem.toggleClass('is-active');
            if ($(this).hasClass('rotate')) {
                $(this).next().addClass('toggled');
            } else {
                $(this).next().removeClass('toggled');
            }
        });
        $('.header nav ul li.menu-item a').click(function () {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        var nav = document.querySelector('nav');

        $('.switch-btn').click(function () {
            $(this).toggleClass('switch-on');

            if ($(this).hasClass('switch-on')) {
                $('.business').show();
                $('.personal').hide();
                $('.left-type').removeClass('active');
                $('.right-type').addClass('active');
            } else {
                $('.business').hide();
                $('.personal').show();

                $('.left-type').addClass('active');
                $('.right-type').removeClass('active');
            }
        });

        if ($('.swiper-collections')) {
            var swiper = new Swiper('.swiper-collections', {
                slidesPerView: 2.2,
                spaceBetween: 16,
                breakpoints: {
                    767: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    998: {
                        slidesPerView: 4,
                        spaceBetween: 16,
                    },
                    1340: {
                        slidesPerView: 5,
                        spaceBetween: 16,
                    },
                },
                navigation: {
                    nextEl: '.swiper-next-testimonials',
                    prevEl: '.swiper-prev-testimonials',
                },

                speed: 1000,
                grid: {
                    rows: 2,
                },
            });
				}


    });
})(jQuery);




