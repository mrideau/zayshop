let currentImg;
let thumbnails, thumbnail;
let products;

function update_preview(src) {
    currentImg.attr('src', src);
}

function scroll_horizontally( offset ) {
    thumbnails.scrollLeft(thumbnails.scrollLeft() + offset);
}

function scroll_vertically( offset ) {
    thumbnails.scrollTop(thumbnails.scrollTop() + offset);
}

$(document).ready(function() {
    currentImg = $('.current-image');
    thumbnails = $('.thumbnails');
    thumbnail = $('.thumbnail').first();

    dots = $('.related-products').find('.dot');
    products = $('.related-products').find('.product-item');

    update_related_products();
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

let current_page = 1;
let get_items_per_page = () => {
    return $(window).width() >= 992 ? 4 : 2;
};
let get_product_id = () => {
    return current_page + current_page % products.length - 2;
}

function update_related_products() {
    let product_id = get_product_id();
    let items_per_page = get_items_per_page();

    products.hide();

    for (let index = 0; index < items_per_page; index++) {
        products.eq(product_id + index).show();
    }

    dots.hide();

    for (let index = 0; index < products.length / items_per_page; index++) {
        let dot = dots.eq(index);
        dot.show();
        dot.click(function() {
            dots.eq(current_page - 1).removeClass('active');
            current_page = index + 1;
            update_related_products();
        });
    }

    dots.eq(current_page - 1).addClass('active');
}

let x = window.matchMedia("(max-width: 992px)");
x.addEventListener("change", event => {
    if (event.matches)
        update_related_products();
});

x = window.matchMedia("(min-width: 992px)");
x.addEventListener("change", event => {
    if (event.matches)
        update_related_products();
});