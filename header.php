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

            <div class="menu-top-wrapper">

               <div class="wrapper wrapperMenu">

                <div class="menu" role="navigation">
                    <div class="bt-menu">
                        <label for="checkboxMenu" aria-label="Menu"><span class="icon"></span><span class="text-menu">Fermer</span></label>
                    </div>
                    <a href="<?php echo get_site_url();?>/vlog" class="lien-vlog"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-play"></use></svg>Vlog</a>
                    <a id="link_tags" class="link-tags"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-hashtag"></use></svg>Tags</a>
                </div>

                <div class="logo">
                    <a href="<?php echo home_url(); ?>" aria-label="Or Norme, retour à l'accueil">
                        <?php echo file_get_contents(get_template_directory_uri().'/img/logo-ornorme.svg'); ?>
                    </a>
                </div>

                <div class="menu-right">
                   
                    <?php
                    
                    $argCat = array(
                            'post_type'		=> 'revue',
                            'posts_per_page' => 1,
                        ); 

                        $singleCat = new WP_Query( $argCat ); ?>

                        <?php if($singleCat->have_posts() ): ?>

                        <?php while($singleCat->have_posts() ) : $singleCat->the_post(); ?>
                        
                        <?php $image = get_field('apercu'); ?>

                   
                    <a class="lire-revue" href="<?php the_field('lien_vers_le_pdf');?>" target="_blank" title="<?php the_title();?>">
                        <img src="<?php echo $image['sizes']['large300']; ?>" alt=""/>
                        <?php the_field('texte'); ?>
                    </a>
                    
                    <?php endwhile; ?>
                    <?php endif;?>
                    
                    <div class="bas"></div>
                    <?php get_search_form(); ?>
                     
                </div>

                </div>

            </div>

            <?php // Le Menu desktop ?>

            <div class="wrapper-menu menu-desktop">
                <div class="wrapper">
                    <div class="menu-cat-wrapper">
                        <ul>
                        <?php foreach(get_categories() as $cat): ?>
                        <li data-menu="<?php echo $cat->slug;?>" class="<?php echo $cat->slug;?>"><a href="<?php echo get_site_url().'/'.$cat->slug;?>"><?php echo $cat->name;?></a></li>
                        <?php endforeach; ?>
                        <li class="vlog"><a href="<?php echo get_site_url();?>/vlog">Vlog</a></li>
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

                        $singleCat = new WP_Query( $argCat ); ?>

                        <?php if($singleCat->have_posts() ): ?>

                            <div class="cat-menu cat-<?php echo $cat->slug; ?>">

                                <div class="hgroup-cat">
                                    <h1><?php echo $cat->name; ?></h1>
                                    <p><?php echo $cat->description; ?></p>
                                </div>
                                
                                <div class="big-wrapper-menu">
                                
                                    <div class="wrapper-articles-menu">

                                    <?php while($singleCat->have_posts() ) : $singleCat->the_post(); ?>

                                        <div class="">
                                            <a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail('large600'); ?></a>
                                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                        </div>

                                    <?php endwhile; ?>

                                    </div>

                                    <div class="menu-pub">Pub</div>
                                
                                </div>

                            </div>
                        <?php endif;?>    
                        <?php endforeach; ?>

                        <div class="vlog-menu">

                        <?php
                            $argvlog = array(
                            'post_type'		=> 'vlog',
                            'posts_per_page' => 4,
                        ); 

                        $singleVlog = new WP_Query( $argvlog ); ?>

                        <?php if($singleVlog->have_posts() ): ?>

                            <div>

                                <div class="hgroup-cat">
                                    <h1>Vlog</h1>
                                    <p>Nos photos & vidéos</p>
                                </div>
                                
                                <div class="big-wrapper-menu">

                                    <div class="wrapper-articles-menu">

                                    <?php while($singleVlog->have_posts() ) : $singleVlog->the_post(); ?>

                                        <div class="single-vlog">
    <a class="thumb-vlog" href="<?php the_permalink();?>"><?php the_post_thumbnail('large600'); ?></a>
    <div class="meta-vlog">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <div class="temps-vlog">
            <a href="<?php the_permalink();?>"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-btn_play"></use></svg></a>
            <span><?php the_field('duree_video');?></span>
        </div>
    </div>
</div>

                                    <?php endwhile; ?>

                                    
                                
                                </div>
                                
                                <div class="menu-pub">Pub</div>

                                </div>

                            </div>
                        <?php endif;?>    

                        </div>

                        </div>
                    </div>
                </div>
            </div> 

            <?php // Le Menu responsive ?>

            <div class="wrapper-menu menu-mobile">
                <div class="wrapper">
                    <div class="menu-cat-wrapper">
                       <ul>
                          
                          <li class="has-submenu rubriques">
                              <a href="#"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg>Rubriques</a>
                              <ul>
                            <?php foreach(get_categories() as $cat): ?>
                            <li data-menu="<?php echo $cat->slug;?>" class="<?php echo $cat->slug;?>"><a href="<?php echo get_site_url().'/'.$cat->slug;?>"><?php echo $cat->name;?></a></li>
                            <?php endforeach; ?>
                              </ul>
                          </li>
                                        
                            
                            <li class="vlog"><a href="<?php echo get_site_url();?>/vlog"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-play"></use></svg>Vlog</a></li>
                            <li class="tags"><a href=""><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-hashtag"></use></svg>Tags</a></li>
                       </ul>
                       
                    </div>
                </div>
            </div> 

            <?php // Le menu des tags ?>
            


            <div class="wrapper-tags">
                <div class="wrapper">
                    
                     <ul>
                        <?php foreach(get_tags() as $tag): ?>
                         <li><a href="<?php echo get_site_url();?>/tag/<?php echo $tag->slug;?>"><?php echo $tag->name; ?></a></li>
                         <?php endforeach; ?>
                     </ul>
                </div>
            </div>  
    </header>
    <!-- /header -->

  
  
   <div class="main">