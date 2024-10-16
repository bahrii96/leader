(function ($) {
    $(document).ready(function () {
        $('button.get-score').click(function () {
            $('div.question-group-area').each(function () {
                var radioList = $('div.question-group-area input:radio');
                var radioXTotal = $('input[data-group-total="X"]');
                var radioXQuestionTotal = $('input[data-group-questions="X"]');
                var radioYTotal = $('input[data-group-total="Y"]');
                var radioYQuestionTotal = $('input[data-group-questions="Y"]');
                var radioNameList = new Array();
                var radioUniqueNameList = new Array();
                var radioXCount = 0;
                var radioXQueCount = 0;
                var radioYCount = 0;
                var radioYQueCount = 0;
                var notCompleted = 0;
                for (var i = 0; i < radioList.length; i++) {
                    radioNameList.push(radioList[i].name);
                }
                radioUniqueNameList = jQuery.unique(radioNameList);

                for (var i = 0; i < radioUniqueNameList.length; i++) {
                    $que_group = $('input:radio[name=' + radioUniqueNameList[i] + ']').closest('.question-group');
                    var axis = $que_group.data('axis');
                    if (typeof $('input[name=' + radioUniqueNameList[i] + ']:checked').val() === 'undefined') {
                        $que_group.addClass('question-error');
                        notCompleted++;
                    } else {
                        if (axis == 'X') {
                            radioXCount = radioXCount + $('input[name=' + radioUniqueNameList[i] + '][data-axis="X"]:checked').val() * 1;
                        }
                        if (axis == 'Y') {
                            radioYCount = radioYCount + $('input[name=' + radioUniqueNameList[i] + '][data-axis="Y"]:checked').val() * 1;
                        }
                    }
                    if (axis == 'X') {
                        radioXQueCount = radioXQueCount + 1;
                    }
                    if (axis == 'Y') {
                        radioYQueCount = radioYQueCount + 1;
                    }
                }

                if (notCompleted == 0) {
                    radioXTotal.val(radioXCount);
                    radioYTotal.val(radioYCount);
                    radioXQuestionTotal.val(radioXQueCount * 3);
                    radioYQuestionTotal.val(radioYQueCount * 3);

                    quizSubmit();
                } else {
                    radioXTotal.val();
                    radioYTotal.val();

                    $('html, body').animate(
                        {
                            scrollTop: $('.question-error:visible:first').offset().top - 150,
                        },
                        1000,
                    );
                }
            });
        });

        $('.question-slider').slider({
            min: 0,
            max: 100,
            value: 50,
            range: 'min',
            slide: function (event, ui) {
                var que = $(this).data('que');
                $('input:radio[name=' + que + ']')
                    .closest('.question-group')
                    .removeClass('question-error');
                if (ui.value < 50) {
                    bg_left(ui.value + '%', que);
                    bg_right('', que);
                } else if (ui.value > 50) {
                    bg_right(100 - ui.value + '%', que);
                    bg_left('', que);
                }
            },
            stop: function (event, ui) {
                var que = $(this).data('que');
                // sliderGoTo(que, value = '50', left = '', right = '', update = false)
                if (ui.value <= 18) {
                    sliderGoTo(que, '0', '0%', '', true);
                } else if (ui.value > 18 && ui.value < 40) {
                    sliderGoTo(que, '25', '25%', '', true);
                } else if (ui.value > 60 && ui.value < 82) {
                    sliderGoTo(que, '75', '', '25%', true);
                } else if (ui.value >= 82) {
                    sliderGoTo(que, '100', '', '0%', true);
                } else {
                    sliderGoTo(que);
                }
            },
        });

        function sliderGoTo(que, value = '50', left = '', right = '', update = false) {
            $('.question-slider[data-que="' + que + '"]')
                .slider('value', value)
                .removeClass('centered');

            radio = value;
            if (value == '25') {
                radio = 1;
            }
            if (value == '75') {
                radio = 2;
            }
            if (value == '100') {
                radio = 3;
            }
            if (value == '50') {
                $('.question-slider[data-que="' + que + '"]').addClass('centered');
                $('.question-slider[data-que="' + que + '"] .ui-slider-handle').blur();
            }

            bg_left(left, que);
            bg_right(right, que);
            if (update) {
                $('input[name=' + que + '][value="' + radio + '"]').prop('checked', true);
            } else {
                $('input[name=' + que + ']').prop('checked', false);
            }
        }

        $('input[type=radio]').change(function () {
            $(this).closest('.question-group').removeClass('question-error');
            que = $(this).attr('name');
            input_value = parseInt($(this).val(), 10);
            if (input_value == 0) {
                sliderGoTo(que, '0', '0%', '', true);
            }
            if (input_value == 1) {
                sliderGoTo(que, '25', '25%', '', true);
            }
            if (input_value == 2) {
                sliderGoTo(que, '75', '', '25%', true);
            }
            if (input_value == 3) {
                sliderGoTo(que, '100', '', '0%', true);
            }
        });

        function bg_left(value = '', que) {
            $('.question-slider-bg[data-que-bg="' + que + '"]').css('left', value);
        }
        function bg_right(value = '', que) {
            $('.question-slider-bg[data-que-bg="' + que + '"]').css('right', value);
        }

        function quizSubmit() {
            $('html, body').animate(
                {
                    scrollTop: $('section.leader-type-quiz').offset().top - 120,
                },
                1000,
            );

            $('#quiz-questions').slideUp(500);

            $quadrant = $('#your-quadrant');
            var quadrant_text = '';
            var quadrant_num = 1;

            var x_score = $('input[data-group-total="X"]').val();
            var x_total = $('input[data-group-questions="X"]').val();
            var x_percentage = ((x_score / x_total) * 100).toFixed(2);
            if (x_percentage == 50) {
                console.log('X is 50% - ' + x_percentage);
                x_percentage = x_percentage - 0.5;
            }
            // Correction for starting the x axis from the right hand side
            x_percentage = 100 - x_percentage;

            var y_score = $('input[data-group-total="Y"]').val();
            var y_total = $('input[data-group-questions="Y"]').val();
            var y_percentage = ((y_score / y_total) * 100).toFixed(2);
            if (y_percentage == 50) {
                console.log('Y is 50% - ' + y_percentage);
                y_percentage = y_percentage - 0.5;
            }

            console.log('X = ' + x_score + ' / ' + x_total + ' (' + x_percentage + '%)');
            console.log('Y = ' + y_score + ' / ' + y_total + ' (' + y_percentage + '%)');

            // $('.quadrants').css('--quiz-X', x_percentage + '%');
            // $('.quadrants').css('--quiz-Y', y_percentage + '%');

            $('.quadrants')
                .get(0)
                .style.setProperty('--quiz-X', x_percentage + '%');
            $('.quadrants')
                .get(0)
                .style.setProperty('--quiz-Y', y_percentage + '%');

            if (x_percentage < 50 && y_percentage < 50) {
                quadrant_num = 3;
            } else if (x_percentage < 50 && y_percentage > 50) {
                quadrant_num = 1;
            } else if (x_percentage > 50 && y_percentage > 50) {
                quadrant_num = 2;
            } else if (x_percentage > 50 && y_percentage < 50) {
                quadrant_num = 4;
            }

            var quad_name = $('[data-quadrant="' + quadrant_num + '"]')
                .find('h3')
                .html();
            var quad_text = $('[data-quadrant="' + quadrant_num + '"]')
                .find('.quadrant-description')
                .html();

            quadrant_text += '<h2>' + quad_name + '</h2>';
            quadrant_text += quad_text;

            $quadrant.html(quadrant_text);

            $('#quiz-totals').slideDown(500);
        }

        $('button[data-restart]').click(function () {
            $('input[data-group-total]').val('');
            $('input[data-group-questions]').val('');
            $(':radio').prop('checked', false);
            $('#quiz-totals').hide();
            $('#your-quadrant').html('');
            $('.question-slider').slider('value', '50');
            $('.question-slider-bg').css('left', '');
            $('.question-slider-bg').css('right', '');
            $('.quadrants').css('--quiz-X', '');
            $('.quadrants').css('--quiz-Y', '');
            $('#quiz-questions').slideDown(500);
            $('#quiz-totals').slideUp(500);

            $('.question-slider').addClass('centered');

            $('html, body').animate(
                {
                    scrollTop: $('section.leader-type-quiz').offset().top - 120,
                },
                1000,
            );
        });
    });
})(jQuery);

