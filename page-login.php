<?php
// Template Name: Login
get_header(); ?>

<main id="login">
    <?php wp_login_form( array( 'redirect' => home_url() ) ); ?>
</main>

<?php get_footer(); ?>