<footer>
    <div class="content">
        <div class="columns">
            <div class="column">
                <h3 class="zayshop">ZayShop</h3>
                <span class="separator"></span>
                <ul class="menu">
                    <li>
                        <?php $adress = get_theme_mod( 'zayshop_adress' ); ?>
                        <a href="http://maps.google.com/?q=<?php echo $adress; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i> <?php echo $adress; ?></a>
                    </li>
                    <li>
                        <?php $tel = get_theme_mod( 'zayshop_tel' ); ?>
                        <?php preg_match_all( '([0-9]+)', $tel, $matches ); ?>
                        <a href="tel:+<?php echo implode( $matches[ 0 ] ); ?>"><i class="fas fa-phone-alt"></i> <?php echo $tel; ?></a>
                    </li>
                    <li>
                        <?php $email = get_theme_mod( 'zayshop_mail' ); ?>
                        <a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <?php echo $email ?></a>
                    </li>
                </ul>
            </div>
            <div class="column">
                <h3>Products</h3>
                <span class="separator"></span>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_products',
                        'container' => 'ul',
                ) ); ?>
            </div>
            <div class="column">
                <h3>Further Info</h3>
                <span class="separator"></span>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_futher_info',
                        'container' => 'ul',
                    ) ); ?>
            </div>
        </div>
        <span class="separator"></span>
        <div class="bottom">
            <div class="sci">
                <a aria-label="Facebook Page" href="https://facebook.com/zayshop"><i class="fab fa-lg fa-facebook-f"></i></a>
                <a aria-label="Instagram Page" href="https://instagram.com/zayshop"><i class="fab fa-lg fa-instagram"></i></a>
                <a aria-label="Twitter Page" href="https://twitter.com/zayshop"><i class="fab fa-lg fa-twitter"></i></a>
                <a aria-label="Linkedin Page" href="https://linkedin.com/zayshop"><i class="fab fa-lg fa-linkedin"></i></a>
            </div>
            <div class="mail">
                <form>
                    <input type="email" placeholder="Email adress">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <p>Copyright &copy Company Name | Designed by <a href="https://templatemo.com/">TemplateMo</a></p>
    </div>
</footer>