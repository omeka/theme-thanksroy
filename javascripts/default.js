if (!ThanksRoy) {
    var ThanksRoy = {};
}

(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
	// smartresize
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');

(function ($) {

    ThanksRoy.moveNavOnResize = function() {
        var primaryNavUl;
        var moveNav = function () {
            if ($(window).width() < 768) {
                primaryNavUl = $('#primary-nav ul.navigation').first().detach();
                $(primaryNavUl).insertBefore('#wrap');
                $(primaryNavUl).addClass('mobile');
            } else {
                primaryNavUl = $('.menu-button + ul.navigation').detach();
                $(primaryNavUl).prependTo('#primary-nav');
                $(primaryNavUl).removeClass('mobile');
            }
        }
        moveNav();

        $(window).smartresize(function() {
            moveNav();
        });
    };

    ThanksRoy.mobileMenu = function() {
        $('.navigation li a').each( function() {
            if ($(this).next().length > 0) {
                $(this).parent().addClass('parent');
            }
        })

        // touch device parent navigation link fix from
        // http://stackoverflow.com/questions/27560653/jquery-on-double-click-event-dblclick-for-mobile
        var touchtime = 0;
        $('.navigation').on('touchend', '.parent > a', function() {
            if(touchtime == 0) {
                //set first click
                touchtime = new Date().getTime();
            } else {
                //compare first click to this click and see if they occurred within double click threshold
                if(((new Date().getTime())-touchtime) < 800) {
                    //double click occurred
                    touchtime = 0;
                    window.location.href = $(this).attr('href');
                } else {
                    //not a double click so set as a new first click
                    touchtime = new Date().getTime();
                }
            }
        });

        $('.menu-button').click( function(e) {
            e.preventDefault();
            $('.mobile').toggle();
        });
    };

})(jQuery);
