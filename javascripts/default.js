if (!ThanksRoy) {
    var ThanksRoy = {};
}

(function ($) {

    ThanksRoy.mobileMenu = function() {
        $('#primary-nav li ul').each(function() {
            var childMenu = $(this);
            var subnavToggle = '<button type="button" class="sub-nav-toggle" aria-label="Show subnavigation"></button>';
            childMenu.parent().addClass('parent');
            childMenu.addClass('sub-nav').before(subnavToggle);
        });

        $('.menu-button').click( function(e) {
            e.preventDefault();
            $('#primary-nav ul.navigation').toggle();
        });

        $('#primary-nav').on('click', '.sub-nav-toggle', function() {
            $(this).parent('.parent').toggleClass('open');
            console.log('click');
        });
    };

})(jQuery);
