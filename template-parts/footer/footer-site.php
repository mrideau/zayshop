<footer>
    <div class="content">
        <div class="columns">
            <div class="column">
                <h3 class="zayshop">ZayShop</h3>
                <span class="separator"></span>
                <ul class="menu">
                    <li>
                        <a href=""><i class="fas fa-map-marker-alt"></i> <?php echo get_theme_mod( 'zayshop_adress' ) ?></a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-phone-alt"></i> <?php echo get_theme_mod( 'zayshop_tel' ) ?></a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-envelope"></i> <?php echo get_theme_mod( 'zayshop_mail' ) ?></a>
                    </li>
                </ul>
            </div>
            <div class="column">
                <h3>Products</h3>
                <span class="separator"></span>
                <ul>
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer_products',
                            'container' => 'ul',
                        ) ); ?>
                </ul>
            </div>
            <div class="column">
                <h3>Further Info</h3>
                <span class="separator"></span>
                <ul>
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer_futher_info',
                            'container' => 'ul',
                        ) ); ?>
                </ul>
            </div>
        </div>
        <span class="separator"></span>
        <div class="bottom">
            <div class="sci">
                <a href=""><i class="fab fa-lg fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-lg fa-instagram"></i></a>
                <a href=""><i class="fab fa-lg fa-twitter"></i></a>
                <a href=""><i class="fab fa-lg fa-linkedin"></i></a>
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
        <p>Copyright &copy Company Name | Designed by <a href="">TemplateMo</a></p>
    </div>
</footer>