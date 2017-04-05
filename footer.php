
        <?php include('snippets/lien-mobile.php'); ?>
        <?php include('snippets/newsletter.php'); ?>
        
        </div><!--main-->
        
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
                    <li><a href="https://www.facebook.com/magazine.ornorme.strasbourg/" target="_blank"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_facebook"></use></svg></a></li>
                    <li><a href="https://twitter.com/OrNorme_Mag" target="_blank"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_twitter"></use></svg></a></li>
                    <li><a href="https://www.youtube.com/channel/UCVYt-Vxg8qEqxNnfttsLrcQ" target="_blank"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_youtube"></use></svg></a></li>
                </ul>
            </div>
        </div>

        <!-- footer -->
        <footer class="footer" role="contentinfo">
            
            <div class="wrapper">
                
                <!-- copyright -->
                <p class="copyright">
                    Or Norme <?php echo date('Y'); ?> &copy; All Rights reserved <a href="<?php echo(get_site_url());?>/mentions-legales">Mentions légales</a>
                </p>
                <!-- /copyright -->
            
            </div>

        </footer>
        <!-- /footer -->
        
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96848731-1', 'auto');
  ga('send', 'pageview');

</script>

    <?php wp_footer(); ?>

	</body>
</html>
