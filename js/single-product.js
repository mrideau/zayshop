var currentImg;
var thumbnails, thumbnail;
var products;

function update_preview(src) {
    currentImg.attr('src', src);
}

function scroll_thumbnails( offset ) {
    thumbnails.scrollLeft( thumbnails.scrollLeft() + offset);
}

$(document).ready(function() {
    currentImg = $('.current-image');
    thumbnails = $('.thumbnails');
    thumbnail = $('.thumbnail').first();

    dots = $('.related-products').find('.dots');
    // dots.eq(0).addClass('active');

    

    products = $('.related-products').find('.product-item');

    update_related_products_page(1)
});

function update_related_products_page(n) {
    var items_per_page = 4

    var width = $(window).width();

    if (width <= 992)
        items_per_page = 2;

    var pageId = n + n % products.length - 2;

    dots.find('.dot').remove();
    products.hide();

    for (let i = 0; i < items_per_page; i++) {
        products.eq(pageId + i).show();
    }
    products.eq(pageId).show();
    products.eq(pageId+1).show();

    for (let i = 0; i < products.length / items_per_page; i++) {
        var dot = $('<span class="dot"></span>');
        dots.append(dot);

        if (n == i+1) 
            dot.addClass('active');
        else
            dot.click(function() {
                update_related_products_page(i+1)
            });
    }

    $(window).resize(function() {
        var width = $(this).width();
        // update_related_products_page(n)
    });
}