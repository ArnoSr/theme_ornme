<?php get_header(); ?>

    <div class="fond-404">
        <div class="wrapper">
          
          <div class="illu404">
              <img src="<?php echo get_template_directory_uri();?>/img/image404.png" alt="">
          </div>
          
          <div class="text404">
            <h1>404</h1>
				<p>Page introuvable !</p>
				<p>Il semblerait que vous êtes perdu...</p>
				
				<a href="<?php echo home_url(); ?>" class="bt">Retour à l'accueil</a>
          </div>
            
        </div>
    </div>

<?php get_footer(); ?>
