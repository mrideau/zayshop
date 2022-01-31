<?php get_header(); ?>
<main id="shop">
    <h1>Archive Products</h1>
    <div>

    </div>
    <div class="products">
        <?php
            if ( have_posts() ) : while( have_posts() ) : the_post()
        ?>
            <article>
                <div>

                </div>
                <div class="details">
                    <h3 class="title"><?php the_title(); ?></h3>
                    <p class="price"><?php the_field( 'price' ); ?></p>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>