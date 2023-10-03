(function ($) {
        const $preloader = $('.preloader ');
        let page = 2;
        $('.related-posts__show-more-js').click(function () {
            $preloader.removeClass('preloader--hidden');

            let button = $(this),
                newPage = page++;
            $.ajax({
                url: objectajax.ajaxurl,
                type: 'post',
                data: {
                    action: 'loadmore',
                    page: page,
                    security: objectajax.security
                },
                success: function (response) {
                    $preloader.addClass('preloader--hidden');
                    if (response) {
                        button.attr('data-page', newPage);
                        $('.related-posts__list-js').append(response);
                    } else {
                        button.remove();
                    }
                },
                complete: function () {
                    let total = button.data('total'),
                        $relatedPostsList = $('.related-posts__list-js'),
                        numberOfChildren = $relatedPostsList.children().length;
                    if (total === numberOfChildren) {
                        button.remove();
                    }
                }
            });
        });

})(jQuery);
