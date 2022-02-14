<section class="section brands">
    <h2>Our Brands</h2>
    <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae iusto.</p>
    <?php 
    $images = get_field( 'brands', 'options' ); ?>
    <ul class="brands-list">
        <?php foreach( $images as $image ) : ?>
            <li>
                <img src="<?php echo esc_url($image['sizes']['brand-thumbnail']); ?>"
                alt="Thumbnail of <?php echo esc_attr($image['alt']); ?>"
                width="<?php echo esc_attr( $image['sizes'][ 'brand-thumbnail-width' ] ); ?>"
                height="<?php echo esc_attr( $image['sizes'][ 'brand-thumbnail-height' ] ); ?>"/>
            </li>
        <?php  endforeach;?>
    </ul>
</section>