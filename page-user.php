<?php get_header(); ?>

<?php
    
?>

<main id="user">
    <h3>Profile</h3>
    <?php echo do_shortcode( '[contact-form-7 id="203" title="Fomulaire Profile"]' ); ?>
    <a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
</main>

<?php get_footer(); ?>