<?php get_header(); ?>

<main id="single-product">
    <div class="product">
        <div class="product-images">
            <div class="img-box">
                <img src="" alt="">
            </div>
            <div class="galery">
                <button><i class="fas fa-chevron-left"></i></button>
                <div class="thumbnails">
                    <?php 
                    $images = get_field( 'galery' ); ?>
                    <ul>
                        <?php foreach( $images as $image ) : ?>
                            <li class="thumbnail">
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="Thumbnail of <?php echo esc_attr($image['alt']); ?>" />
                            </li>
                        <?php  endforeach;?>
                    </ul>
                </div>
                <button><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="product-details">
            <h2 class="product-title"><?php the_title(); ?></h2>
            <p class="product-price">$<?php echo number_format( get_field( 'price' ), 2 ); ?></p>
            <div class="product-rating-comments">
                <?php $stars = get_field( 'stars' ); ?>
                <p><?php zayshop_stars( $stars ) ?></p>
                <p>Rating <?php echo $stars ?> | 36 Comments</p>
            </div>
            <section class="product-brand">
                <p class="title">Brand:</p>
                <p class="brand"><?php the_field( 'brand' ); ?></p>
            </section>
            <section class="product-description">
                <p class="title">Description:</p>
                <p><?php the_field( 'description' ); ?></p>
            </section>
            <section class="product-colors">
                <p class="title">Avaliable Color:</p>
                <p class="color"><?php the_field( 'colors' ); ?></p>
            </section>
            <section class="product-description">
                <p class="title">Specifications:</p>
                <p><?php the_field( 'specifications' ); ?></p>
            </section>
            <div class="product-parameters">
                <section class="product-sizes">
                    <p>Size :</p>
                    <form>
                        <?php $sizes_checked_values = get_field( 'sizes' ); ?>
                        <?php if ( $sizes_checked_values ) : ?>
                            <?php foreach ( $sizes_checked_values as $key => $sizes_value ): ?>
                                <input type="radio" name="size" id="<?php echo $key ?>">
                                <label for="<?php echo $key ?>">
                                    <?php echo esc_html( $sizes_value ); ?>
                                </label>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </form>
                </section>
                <section class="product-quantity">
                    <p>Quantity</p>
                    <form>
                        <input type="button" value="+">
                        <input type="number" id="quantity" name="quantity"
                        min="1" max="99" value="1">
                        <input type="button" value="-">
                    </form>
                </section>
            </div>
            <section class="product-buttons">
                <button>Buy</button>
                <button>Add To Cart</button>
            </section>
        </div>
    </div>
    <div class="related-products">

    </div>
</main>

<?php get_footer(); ?>