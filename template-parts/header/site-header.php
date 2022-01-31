<header>
    <div class="top-bar">
        <!-- <?php
            // if (is_active_sidebar( 'top-bar' ))
                dynamic_sidebar( 'top-bar' );
        ?> -->
        <ul>
            <li>
                <a href=""><i class="fas fa-envelope"></i> <?php echo get_theme_mod( 'zayshop_mail' ) ?></a>
            </li>
            <li>
                <a href=""><i class="fas fa-phone-alt"></i> <?php echo get_theme_mod( 'zayshop_tel' ) ?></a>
            </li>
        </ul>
        <ul>
            <li>
                <a href=""><i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-twitter"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-linkedin"></i></a>
            </li>
        </ul>
    </div>
    <nav class="navbar">
        <?php
        // Website logo
        if (has_custom_logo())
            the_custom_logo();
        
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => 'ul',
            // 'before' => '<li class="menu-item">',
            // 'after' => '</li>'

        ) ); ?>
        
        <ul class="nav-icons">
            <li class="nav-icon">
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </li>
            <li class="nav-icon">
                <button>
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="icon-badge">7</span>
                </button>
            </li>
            <li class="nav-icon">
            <button>
                    <i class="fas fa-user"></i>
                    <span class="icon-badge">+99</span>
                </button>
            </li>
        </ul>
    </nav>
    <div class="search-bar">
        <form action="">
            <input type="text" placeholder="Rechercher">
        </form>
    </div>
    <div class="cart">
        <h3><i class="fas fa-shopping-cart"></i> Votre panier : 1 item</h3>
        <div class="items">
            <div class="item">

            </div>
        </div>
        <h4>Summary</h4>
        <div class="fields">
            <div class="field">
                <p>Articles</p>
                <p>$50.00</p>
            </div>
            <div class="field">
                <p>Shipping</p>
                <p>$10.00</p>
            </div>
            <div class="field total">
                <p>Total</p>
                <p>$60.00</p>
            </div>
        </div>
        <button class="orderbtn"><i class="fas fa-check"></i> Place Order</button>
    </div>
</header>