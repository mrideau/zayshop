<header>
    <div class="top-bar">
        <ul>
            <li>
                <?php $email = get_theme_mod( 'zayshop_mail' ); ?>
                <a aria-label="Email Adress" href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <?php echo $email ?></a>
            </li>
            <li>
                <?php $tel = get_theme_mod( 'zayshop_tel' ); ?>
                <?php preg_match_all( '([0-9]+)', $tel, $matches ); ?>
                <a aria-label="Phone Number" href="tel:+<?php echo implode( $matches[ 0 ] ); ?>"><i class="fas fa-phone-alt"></i> <?php echo get_theme_mod( 'zayshop_tel' ) ?></a>
            </li>
        </ul>
        <ul>
            <li>
                <a aria-label="Facebook Page" href=""><i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
                <a aria-label="Instagram Page" href=""><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a aria-label="Twitter Page" href=""><i class="fab fa-twitter"></i></a>
            </li>
            <li>
                <a aria-label="Linkedin Page" href=""><i class="fab fa-linkedin"></i></a>
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

        ) ); ?>
        
        <ul class="nav-icons">
            <li class="nav-icon">
                <button aria-label="Open Search Bar" id="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </li>
            <li class="nav-icon">
                <button aria-label="Open Cart" id="cart-btn">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="icon-badge">7</span>
                </button>
            </li>
            <li class="nav-icon">
                <button aria-label="User Page">
                    <a href="<?php echo home_url( '/user/' ) ?>">
                        <i class="fas fa-user"></i>
                        <span class="icon-badge">+99</span>
                    </a>
                </button>
            </li>
        </ul>
        <button arial-label="Open Mobile Navigation Menu" class="nav-burger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </nav>
    <div id="search-bar">
        <form action="">
            <input type="text" placeholder="Rechercher">
        </form>
    </div>
    <div id="cart">
        <h3><i class="fas fa-shopping-cart"></i> Votre panier : 1 item</h3>
        <div class="items">
            <div class="item">
                <div class="item-thumbnail">

                </div>
                <div class="item-details">
                    <h2 class="item-name">Lorem ipsum</h2>
                    <p class="item-color">Color: White</p>
                    <p class="item-price">$25.00</p>
                </div>
                <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
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