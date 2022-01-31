function init_slideshow(slideshow) {
    const slides = slideshow.find('.slide');
    const dots = slideshow.find('.dot');
    const buttons = slideshow.find('.buttons');

    var currentSlide = 0; // Tracking current slide
    var last_interaction = Date.now();

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
        slides.eq(currentSlide).fadeOut(500);
        dots.eq(currentSlide).removeClass('active')
        currentSlide = i > slides.length - 1 ? 0 : i < 0 ? slides.length : i; // Check if the desired slide exists
        slides.eq(currentSlide).fadeIn(500);
        dots.eq(currentSlide).addClass('active')
    }

    dots.click(function(event) {
        update_slides($(this).index());
        last_interaction = Date.now();
    });

    buttons.find('.left').click(function() {
        update_slides(currentSlide - 1);
        last_interaction = Date.now();
    });

    buttons.find('.right').click(function() {
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

$(document).ready(function($) {
    init_slideshow($('.slideshow'));
})