<header>
    <nav>
        <?php
            // Website logo
            if (has_custom_logo())
                the_custom_logo();
            
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => 'ul'
            ) );
        ?>

        <ul>
            <li>icon</li>
            <li>icon</li>
            <li>icon</li>
        </ul>
    </nav>
</header>