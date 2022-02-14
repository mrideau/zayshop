function init_slideshow(slideshow) {
    if ( !slideshow ) return;

    const slides = slideshow.find('.slide');
    const dots = slideshow.find('.indicator');

    var currentSlide = 0; // Tracking current slide
    var last_interaction = Date.now(); // Traking last interaction

    console.log('test');

    // Determine the tallest slide and set all slide to this height
    // function resize() {
    //     var maxHeight = -1;

    //     slides.each(function() {
    //         maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    //     });

    //     slides.each(function() {
    //         $(this).height(maxHeight);
    //     });
    // }

    // // Initialize
    // resize();

    // // Resize slideshow when changing window size
    // $(window).resize(function() {
    //     resize();
    // });

    // Initialize all slides
    // Hide all slides and display the current slide
    // Start automatic slideshow
    function init() {
        slides.hide();
        slides.eq(currentSlide).show();
        dots.eq(currentSlide).addClass('active')
        start_interval(); // Automatic slideshow
    }

    // Hide our current slide and show the desired one
    function update_slides(i, pauseInverval) {
        slides.eq(currentSlide).hide();
        dots.eq(currentSlide).removeClass('active')
        currentSlide = i > slides.length - 1 ? 0 : i < 0 ? slides.length - 1 : i; // Check if the desired slide exists
        slides.eq(currentSlide).show();
        dots.eq(currentSlide).addClass('active')
    }

    dots.click(function(event) {
        update_slides($(this).index());
        last_interaction = Date.now();
    });

    slideshow.find('.btn-left').click(function() {
        update_slides(currentSlide - 1);
        last_interaction = Date.now();
    });

    slideshow.find('.btn-right').click(function() {
        update_slides(currentSlide + 1);
        last_interaction = Date.now();
    });

    function start_interval() {
        setInterval(function() {
            if (Date.now() - last_interaction > 2000)
                update_slides(currentSlide + 1)
        }, 5000);
    }

    init(); // Initialize
}

$(document).ready(function() {
    init_slideshow($('.slideshow'));

    // Optimize
    // Hide on click page link
    $('.nav-burger').click(function() {
        $('#menu-menu-principal').toggleClass( 'active' );
    });

    const searchBar = $('#search-bar');
    const cart = $('#cart');

    $('#search-btn').click(function() {
        searchBar.toggle();
        if (cart.is(':visible'))
            cart.hide();
    });

    $('#cart-btn').click(function() {
        cart.toggle();
        if (searchBar.is(':visible'))
            searchBar.hide();
    });
})