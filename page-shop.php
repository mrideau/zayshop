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
        <nav class="links">
            <a href="">Gender <i class="fas fa-chevron-circle-down"></i></a>
            <a href="">Sale <i class="fas fa-chevron-circle-down"></i></a>
            <a href="">Product <i class="fas fa-chevron-circle-down"></i></a>
        </nav>
    </div>

    <div class="products">

        <div class="top">
            <nav class="genders">
                <a href="">All</a>
                <a href="">Men's</a>
                <a href="">Women's</a>
            </nav>

            <input type="text" placeholder="Featured">
        </div>

        <div class="products-grid">
            <?php if ( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post() ?>
            <?php zayshop_product(); ?>
            <?php endwhile; endif; ?>
        </div>

        <?php the_posts_pagination( array(
            'prev_next' => false
        ) ); ?>
    </div>
    
</main>

<?php zayshop_brands(); ?>

<?php get_footer(); ?>