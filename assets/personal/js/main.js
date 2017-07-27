(function ($) {
    $(function () {
        var haeder = {
            init: function () {
                var self = this;
                self.headerFixed();
            },
            headerFixed: function () {
                $(document).scroll(function () {
                    var obj = $('.header').find('.menu');
                    if ($(this).scrollTop() > $('.header').find('.menuBox').offset().top) {
                        obj.css({'position': 'fixed', 'top': '0'});
                    } else {
                        obj.css({'position': 'relative'});
                    }
                });
            }
        };
        haeder.init(); 
    });
})(jQuery);

