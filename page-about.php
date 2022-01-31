<?php get_header(); ?>

<main id="about">
    <section class="heading">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus suscipit necessitatibus repudiandae, voluptas sint aperiam eaque harum id voluptatem corporis quod tempore!</p>
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
    <section class="section brands">
        <h2>Our Brands</h2>
        <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae iusto.</p>
        <?php 
        $images = get_field( 'brands' ); ?>
        <ul class="brands-list">
            <?php foreach( $images as $image ) : ?>
                <li>
                    <img src="<?php echo esc_url($image['sizes']['brand-thumbnail']); ?>" alt="Thumbnail of <?php echo esc_attr($image['alt']); ?>" />
                </li>
            <?php  endforeach;?>
        </ul>
    </section>
</main>

<?php get_footer(); ?>