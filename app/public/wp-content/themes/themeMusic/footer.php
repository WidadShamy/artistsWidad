<footer class="footer">
<nav class="footer-menu navbar navbar-expand-lg navbar-light">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class' => 'navbar-nav',
                'container' => false,
            ));
            ?>
        </nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>