<?php get_header(); ?>

<main id="login">
    <?php wp_login_form( array( 'redirect' => home_url( '/user/' ), 'remember' => false ) ); ?>
</main>

<?php get_footer(); ?>