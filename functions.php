<?php

function zayshop_setup() {
    // Auto set title/description in head
    add_theme_support( 'title-tag' );

    // Add support for custom logo
    add_theme_support( 'custom-logo' );
    // add_theme_support( 'custom-header' );

    // Add thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu' ),
        'footer_products' => 'Footer Products',
        'footer_futher_info' => 'Further Info'
    ) );

    // Images Sizes
    add_image_size( 'brand-thumbnail', 100, 70 );
    // Remove default non-used image sizes
    remove_image_size( '1024x1024' );
    remove_image_size( '1536x1536' );
    remove_image_size( '2048x2048' );

    // Add ACF option page in backoffice
    acf_add_options_page();

    // Hide admin bar for every user except for logged-in administrator role
    if ( !current_user_can( 'administrator' ) && !is_admin() )
        show_admin_bar( false );
}
add_action( 'after_setup_theme', 'zayshop_setup' );

function zayshop_scripts() {
    if ( !current_user_can( 'administrator' ) && !is_admin() ) {
        wp_deregister_style( 'dashicons' );
    }
    wp_enqueue_style( 'zayshop-style', get_stylesheet_uri() );
    // JQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'zayshop-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
    
    // Add single-product JS
    if ( is_single() && get_post_type() == 'product' ) {
        wp_enqueue_script( 'zayshop-js-single-product', get_template_directory_uri() . '/js/single-product.js' );
    }
}
add_action( 'wp_enqueue_scripts', 'zayshop_scripts' );

// Add customizer fields to set some informations used in the theme
function zayshop_customize_register( $wp_customize ) {
    $wp_customize->add_setting('zayshop_adress');
    $wp_customize->add_setting('zayshop_tel');
    $wp_customize->add_setting('zayshop_mail');

    $wp_customize->add_control('zayshop_adress', array(
        'label'   => 'Adress',
        'section' => 'title_tagline',
        'type'    => 'text',
    ));

    $wp_customize->add_control('zayshop_tel', array(
        'label'   => 'Phone Number',
        'section' => 'title_tagline',
        'type'    => 'text',
    ));

    $wp_customize->add_control('zayshop_mail', array(
        'label'   => 'Email Adress',
        'section' => 'title_tagline',
        'type'    => 'text',
    ));
}
add_action( 'customize_register', 'zayshop_customize_register' );

// Register 'product' post type to store our products
function zayshop_register_post_type() {
    $labels = array(
        'name' => 'Products',
        'all_items' => 'All Products',
        'singular_name' => 'Prodcut',
        'add_new' => 'New Product',
        'add_new_item' => 'Add New Product',
        'edit_item' => 'Modify Product',
        'menu_name' => 'Products'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'thumbnail', 'comments', 'excerpt' ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart'
    );

    register_post_type( 'product', $args );

    $labels = array(
        'name' => 'Product Categories',
        'new_item_name' => 'New Category Name'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true
    );

    register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'zayshop_register_post_type' );


function zayshop_redirections() {
    if ( is_page( 'user' ) && !is_user_logged_in() ) {
        wp_redirect( home_url( '/login/' ) );
        exit;
    }
}
add_action( 'template_redirect', 'zayshop_redirections' );

// Hiding wp-login and wp-admin pages.
function redirect_login_page() {
    $login_page = home_url( '/login/' );
    // Parsing the page name.
    $page_viewed = basename( parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH ), '.php' );

    $redirect_to = $_GET[ 'redirect_to' ];
    echo $redirect_to;
    
    if ( ($page_viewed === 'wp-login' || $page_viewed === 'wp-admin') && $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
        if (!is_admin()) {
            wp_redirect( home_url( '/404/' . $redirect_to ) );
            exit;
        }
    }

    // if ( $page_viewed == 'wp-login' && $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
        // wp_redirect( home_url( '/wp-admin/' ) );
        // wp_redirect( home_url( '/404/' ) );
        // wp_redirect( $login_page );
        // global $wp_query;
        // $wp_query->set_404();
        // status_header( 404 );
        // get_template_part( 404 );
        // exit;
    // }
}
// add_action( 'init', 'redirect_login_page' );

function zayshop_login_failed() {
    wp_redirect( home_url( '/login/?login=failed' ) );
    exit;
}
// add_action( 'wp_login_failed', 'zayshop_login_failed' );

function verify_user_login( $user, $username, $password ) {
    if ( $username == '' || $password == '' ) {
		wp_redirect(home_url( '/login/?login=empty'));
		exit;
	}
}
// add_filter( 'authenticate', 'verify_user_login', 1, 3 );

function logout_redirect() {
	wp_redirect (home_url( '/login/?login=false' ) );
	exit;
}
// add_action('wp_logout','logout_redirect');





// Function used to display stars
function zayshop_stars($stars) {
    ?>
    <ul class="stars">
        <?php for ($i=0; $i < 5; $i++) : ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 44 42" fill="none" class="star <?php if ( $i < $stars ) echo "active" ?>">
                <path d="M20.195 1.78273C20.9194 0.264487 23.0806 0.264489 23.805 1.78273L28.7329 12.1099C29.0245 12.7209 29.6053 13.1429 30.2765 13.2314L41.621 14.7268C43.2888 14.9467 43.9567 17.002 42.7366 18.1602L34.4377 26.0381C33.9467 26.5042 33.7248 27.1871 33.8481 27.8528L35.9315 39.1042C36.2378 40.7583 34.4894 42.0286 33.0109 41.2261L22.954 35.7678C22.359 35.4448 21.641 35.4448 21.046 35.7678L10.9891 41.2261C9.51059 42.0286 7.76221 40.7583 8.0685 39.1042L10.1519 27.8528C10.2752 27.1871 10.0533 26.5042 9.56229 26.0381L1.26339 18.1602C0.0433307 17.002 0.711155 14.9467 2.37896 14.7268L13.7235 13.2314C14.3947 13.1429 14.9755 12.7209 15.2671 12.1099L20.195 1.78273Z"/>
                </svg>
            </li>
        <?php endfor; ?>
    </ul>
    <?php
}

// Function to display product
function zayshop_product() {
    ?>
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
    <?php
}

// Function to display brands
function zayshop_brands() {
    ?>
    <section class="section brands">
        <h2>Our Brands</h2>
        <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae iusto.</p>
        <?php 
        $images = get_field( 'brands', 'options' ); ?>
        <ul class="brands-list">
            <?php foreach( $images as $image ) : ?>
                <li>
                    <img src="<?php echo esc_url($image['sizes']['brand-thumbnail']); ?>" alt="Thumbnail of <?php echo esc_attr($image['alt']); ?>" />
                </li>
            <?php  endforeach;?>
        </ul>
    </section>
    <?php
}