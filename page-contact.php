<?php get_header(); ?>

<main id="contact">
    <section class="section heading">
        <h2>Contact us</h2>
        <p class="section-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quo ex nisi, sapiente nam aperiam itaque velit nihil odio aliquid voluptas quia, commodi ipsam excepturi, sed quibusdam sunt fugiat repellendus.</p>
    </section>
    <div class="map">
        <?php $location = get_field( 'location' ); ?>
        <?php if ( $location ) : ?>
            <img src="<?php echo esc_url( $location['url'] ); ?>" alt="<?php echo esc_attr( $location['alt'] ); ?>" />
        <?php endif; ?>
    </div>

    <?php echo do_shortcode( '[contact-form-7 id="61" title="Formulaire de contact"]' ); ?>
</main>

<?php get_footer(); ?>