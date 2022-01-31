<?php get_header(); ?>
<!-- <?php the_content(); ?> -->

<main id="home">
    <section class="slideshow">
        <div class="slides">
            <div class="slide slide-1">
                <div class="text">
                    <h2>Proident occaecat</h2>
                    <h3>Aliquip ex ea commodo consequat</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem cupiditate minus libero, repellendus laborum sed! Eos totam labore ad, perspiciatis ipsam, et nemo at earum vel rerum tempore repellat iusto!</p>
                </div>
                <img class="img" src="" alt="">
            </div>
            <div class="slide slide-2">
                <h2>Slide 2</h2>
            </div>
        </div>
        <div class="buttons">
            <button class="left"><i class="fas fa-4x fa-chevron-left"></i></button>
            <button class="right"><i class="fas fa-4x fa-chevron-right"></i></button>
        </div>
        <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>

    <section class="section cotm">
        <h2>Categories of The Month</h2>
        <p class="section-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        <div class="cards">
        <?php
            $terms = get_terms( array(
                'taxonomy' => 'product_category',
                'hide_empty' => false,
                'order' => 'DESC'
            ) );

            foreach ($terms as $key => $term) {
                if ( get_field( 'category_of_the_month', $term ) ) :
                    $image = get_field( 'image', $term );?>
                    <div class="card">
                        <a href="<?php echo $term->slug; ?>">
                            <img src="<?php echo $image[ 'url' ] ?>" alt="">
                        </a>
                        <h4><?php echo $term->name; ?></h4>
                        <a class="link" href="<?php echo $term->slug; ?>">Go Shop</a>
                    </div>
                <?php endif;
            }?>
        </div>
    </section>

    <?php $wp_query = new WP_Query( 'post_type=product&order=ASC' ); ?>
    <section class="section featured">
        <h2>Featured Products</h2>
        <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, vitae officiis dolores magnam nostrum quibusdam alias!</p>
        <div class="products">
            <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : the_post() ?>
            <?php if ( get_field( 'is_featured_product', get_the_ID() ) ) : ?>
            <div class="feature">
                <div class="img-box">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
                <div class="details">
                    <div class="horizontal">
                        <?php zayshop_stars( get_field( 'stars' ) ); ?>
                        <p>$<?php echo number_format( get_field( 'price' ), 2 ); ?></p>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                    <a href="">Reviews (<?php echo get_comments_number(); ?>)</a>
                </div>
            </div>
            <?php endif; endwhile; endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>