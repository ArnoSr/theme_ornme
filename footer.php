
        <?php include('lien-mobile.php'); ?>
        <?php include('newsletter.php'); ?>
        
        <div class="links-footer">
            <div class="wrapper">
                <div class="logo">
                        <a href="<?php echo home_url(); ?>" aria-label="Or Norme, retour à l'accueil">
                            <?php echo file_get_contents(get_template_directory_uri().'/img/logo-ornorme.svg'); ?>
                        </a>
                    </div>
                <?php
                wp_nav_menu(
                    array(
                        'menu'            => 'Menu footer',
                        'items_wrap'      => '<ul>%3$s</ul>',
                        )
                    );
                ?>
                
                <ul class="links-rs">
                    <li><a href=""><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_facebook"></use></svg></a></li>
                    <li><a href=""><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_twitter"></use></svg></a></li>
                    <li><a href=""><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_youtube"></use></svg></a></li>
                </ul>
            </div>
        </div>

        <!-- footer -->
        <footer class="footer" role="contentinfo">
            
            <div class="wrapper">
                
                <!-- copyright -->
                <p class="copyright">
                    &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?>
                    <a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
                </p>
                <!-- /copyright -->
            
            </div>

        </footer>
        <!-- /footer -->

    <?php wp_footer(); ?>

	</body>
</html>
