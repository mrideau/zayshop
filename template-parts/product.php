<article class="product-item">
    <div class="img-box" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
        <a aria-label="like" class="like-btn" href=""><i class="far fa-2x fa-heart"></i></a>
        <div class="buttons">
            <a href=""><i class="far fa-heart"></i></a>
            <a href="<?php echo the_permalink(); ?>"><i class="fas fa-eye"></i></a>
            <a href=""><i class="fas fa-cart-plus"></i></a>
        </div>
    </div>
    <div class="details">
        <a aria-label="Add to cart" class="cart-btn" href=""><i class="fas fa-cart-plus"></i></a>
        <p class="title"><?php the_title() ?></p>
        <?php $sizes = get_field( 'sizes' ); ?>
        <?php if ( $sizes ) : ?>
            <p class="sizes"><?php echo implode( '/', $sizes ); ?></p>
        <?php endif; ?>
        <?php zayshop_stars( get_field( 'stars' ) ); ?>
        <p class="price">$<?php echo number_format( get_field( 'price' ), 2 ) ?></p>
    </div>
</article>