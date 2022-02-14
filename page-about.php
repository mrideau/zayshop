<?php get_header(); ?>

<main id="about">
    <section class="heading">
        <div>
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus suscipit necessitatibus repudiandae, voluptas sint aperiam eaque harum id voluptatem corporis quod tempore!</p>
        </div>
        <?php $hero_image = get_field( 'hero_image' ); ?>
        <?php if ( $hero_image ) : ?>
            <img src="<?php echo esc_url( $hero_image['sizes']['large'] ); ?>"
            alt="<?php echo esc_attr( $hero_image['alt'] ); ?>"/>
        <?php endif; ?>
    </section>
    <section class="section services">
        <h2>Our Services</h2>
        <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae iusto.</p>
        <div class="cards">
            <div class="card">
                <i class="fas fa-3x fa-truck"></i>
                <p>Delivery Services</p>
            </div>
            <div class="card">
                <i class="fas fa-3x fa-exchange-alt"></i>
                <p>Shipping & Return</p>
            </div>
            <div class="card">
                <i class="fas fa-3x fa-percent"></i>
                <p>Promotion</p>
            </div>
            <div class="card">
                <i class="fas fa-3x fa-user"></i>
                <p>24 Hours Service</p>
            </div>
        </div>
    </section>
    <?php get_template_part( 'template-parts/brands' ); ?>
</main>

<?php get_footer(); ?>