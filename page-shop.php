<?php
// Template Name: Shop
get_header(); ?>

<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $wp_query = new WP_Query( "post_type=product&order=ASC&paged=$paged&posts_per_page=3" );
?>

<main id="shop">
    <div class="categories">
        <h2>Categories</h2>
        <a href="">Gender <i class="fas fa-chevron-circle-down"></i></a>
        <a href="">Sale <i class="fas fa-chevron-circle-down"></i></a>
        <a href="">Product <i class="fas fa-chevron-circle-down"></i></a>
    </div>
    <div class="products">
        <div class="top">
            <div class="genders">
                <a href="">All</a>
                <a href="">Men's</a>
                <a href="">Women's</a>
            </div>
            <input type="text" placeholder="Featured">
        </div>
        <div class="products-grid">
            <?php if ( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post() ?>
                <article class="item">
                    <div class="img-box" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                        <div class="buttons">
                            <a href=""><i class="far fa-heart"></i></a>
                            <a href="<?php echo the_permalink(); ?>"><i class="fas fa-eye"></i></a>
                            <a href=""><i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                    <div class="details">
                        <p class="title"><?php the_title() ?></p>
                        <?php $sizes = get_field( 'sizes' ); ?>
                        <?php if ( $sizes ) : ?>
                            <p class="sizes"><?php echo implode( '/', $sizes ); ?></p>
                        <?php endif; ?>
                        <?php zayshop_stars( get_field( 'stars' ) ); ?>
                        <p class="price">$<?php echo number_format( get_field( 'price' ), 2 ) ?></p>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
        <?php the_posts_pagination( array(
            'prev_next' => false
        ) ); ?>
        
</main>

<?php get_footer(); ?>