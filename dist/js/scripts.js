!function(o){const s=o(".preloader ");let e=2;o(".related-posts__show-more-js").click(function(){s.removeClass("preloader--hidden");let t=o(this),a=e++;o.ajax({url:objectajax.ajaxurl,type:"post",data:{action:"loadmore",page:e,security:objectajax.security},success:function(e){s.addClass("preloader--hidden"),e?(t.attr("data-page",a),o(".related-posts__list-js").append(e)):t.remove()},complete:function(){t.data("total")===o(".related-posts__list-js").children().length&&t.remove()}})})}(jQuery);