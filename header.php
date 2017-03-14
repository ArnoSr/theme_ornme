<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
            
    <div class="svg-wrapper" aria-hidden="true">
        <?php echo file_get_contents(get_template_directory_uri().'/img/svg-prod/sprite/svgs.svg'); ?>
    </div>

        <!-- header -->
        <header class="header" role="banner">
               
               <input type="checkbox" id="checkboxMenu">
                
                <div class="wrapper grid-3">
                    
                    <div class="menu flex-container" role="navigation">
                        <div class="bt-menu">
                            
                            <label for="checkboxMenu" aria-label="Menu"><span class="icon"></span><span class="text-menu">Fermer</span></label>
                        </div>
                        <a href="<?php echo get_site_url();?>/vlog" class="lien-vlog"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-play"></use></svg>Vlog</a>
                        <a href="#"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-hashtag"></use></svg>Tags</a>
                    </div>

                    <div class="logo">
                        <a href="<?php echo home_url(); ?>" aria-label="Or Norme, retour à l'accueil">
                            <?php echo file_get_contents(get_template_directory_uri().'/img/logo-ornorme.svg'); ?>
                        </a>
                    </div>
                    
                    <div class="flex-container menu-right">
                        <a class="lire-revue" href="">
                            <img src="<?php echo get_template_directory_uri();?>/img/mag.png" alt="">
                            Lire la revue
                        </a>
                        <button aria-label="Accéder à la recherche" class="bt-search" title="Accéder à la recherche"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-loupe"></use></svg></use></button>
                    </div>

                </div>
                
                <div class="wrapper-menu">
                 <div class="wrapper">
                  <div class="menu-cat-wrapper">
                    <ul>
                    <?php foreach(get_categories() as $cat): ?>
                        <li data-menu="<?php echo $cat->slug;?>" class="<?php echo $cat->slug;?>"><a href="<?php echo get_site_url().'/'.$cat->slug;?>"><?php echo $cat->name;?></a></li>
                    <?php endforeach; ?>
                        <li><a href="<?php echo get_site_url();?>/vlog">Vlog</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                  </div>
                  <div class="menu-cat-content">
                     
                     <div class="menu-articles">
                         
                     
                      
                <?php foreach(get_categories() as $cat):
        
                    $argCat = array(
                        'post_type'		=> 'post',
                        'posts_per_page' => 4,
                        'category_name' => $cat->slug
                    ); 

                    $singleCat = new WP_Query( $argCat );

                ?>

                <?php if($singleCat->have_posts() ): ?>
    
    <div class="cat-menu cat-<?php echo $cat->slug; ?>">
        
        <p class="description-title"><?php echo $cat->description; ?></p>

        <div class="wrapper-articles-menu">

        <?php while($singleCat->have_posts() ) : $singleCat->the_post(); ?>

            <div class="">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            </div>

        <?php endwhile; ?>

        </div>
    
    </div>
    <?php endif;?>    
    <?php endforeach; ?>
    
    </div>
    
                <div class="menu-pub">
                pub
            </div>
  
                </div>
</div>
            </div>
                
        </header>
        <!-- /header -->