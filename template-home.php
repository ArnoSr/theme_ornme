<?php /* Template Name: Home template */ get_header(); ?>
    
    <?php

    $featured_posts = array();

    $argFeaturedPostTop = array(
        'post_type'		=> 'post',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'mise_en_avant_principale',
                'compare' => '==',
                'value' => '1'
            )
        )
    ); 

    $featuredPostTop = new WP_Query( $argFeaturedPostTop );

    ?>

    <?php if( $featuredPostTop->have_posts() ): ?>
    <?php while( $featuredPostTop->have_posts() ) : $featuredPostTop->the_post(); ?>
    
    <?php array_push($featured_posts, get_the_ID()); ?>
    
    <div class="featured-post" style="background-image: url('<?php the_post_thumbnail_url();?>');">
      
       <div class="wrapper">
          
          <div class="w50">
            <p class="h2-like featured-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
              <p class="featured-excerpt"><a href="<?php the_permalink();?>"><?php the_excerpt();?></a></p>
               
               <?php $cat = get_the_category(); ?>

               <div class="meta">
                   <p><span><?php or_temps_lecture(get_the_content());?></span><span class="featured-author">par <?php the_author_posts_link(); ?></span><span><?php the_time('j F Y');?></span><span class="featured-category name-category <?php echo $cat[0]->slug; ?>"><?php the_category(' ');?></span></p>
               </div>
          </div>

       </div>
    </div>
    
    <?php endwhile; ?>
    <?php endif;?>
    
    <?php wp_reset_query();?>
    
    <div class="wrapper-article-home">
    
    <?php

    // Featured posts

    $argFeaturedPost = array(
        'post_type'		=> 'post',
        'posts_per_page' => 2,
        'post__not_in' => $featured_posts,
        'meta_query' => array(
            array(
                'key' => 'mise_en_avant_secondaire',
                'compare' => '==',
                'value' => '1'
            )
        )
    ); 

    $featuredPost = new WP_Query( $argFeaturedPost );

    ?>

    <?php if( $featuredPost->have_posts() ): ?>
    
        <div class="wrapper wrapper-plus grid has-gutter-xl big-featured">
        <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
            
            <?php array_push($featured_posts, get_the_ID()); ?>

            <div class="format-third one-third  featured-home <?php echo(get_the_category()[0]->slug);?>">

                <div class="bg-category"><?php echo(get_the_category()[0]->name);?></div>
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <div class="excerpt">
                    <?php the_excerpt();?>
                </div>
                <div class="meta">
                 <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span class="featured-author">par <?php the_author_posts_link(); ?></span> <span>Publié le <?php the_time('j F Y');?></span></div>
                 <div class="featured-category-link"><a href="<?php echo get_category_link((get_the_category()[0]->term_id));?>">À retrouver dans notre rubrique <span><?php echo(get_the_category()[0]->name);?></a></div>
                </div>
            </div>
            
        <?php endwhile; ?>

            <div>
                <div class="bg-category">Annonce</div>
            </div>
        </div>
    
    <?php endif;?>    
    <?php wp_reset_query();?>

   
    <?php
        
    // Derniers articles

    $argLastPosts = array(
        'post_type'		=> 'post',
        'posts_per_page' => 10,
        'post__not_in' => $featured_posts,
    ); 

    $LastPosts = new WP_Query( $argLastPosts );

    ?>

    <?php if( $LastPosts->have_posts() ): ?>
    
    <div class="wrapper wrapper-plus home-latests-articles">
        
        <span class="title-discret">Articles les plus récents</span>

        <div class="wrapper-articles">

        <?php while( $LastPosts->have_posts() ) : $LastPosts->the_post(); ?>

            <div class="<?php echo(get_the_category()[0]->slug);?> format format-<?php the_field('format_souhaite');?>">

                <a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail('large1000'); ?></a>
                    <div class="wrap-content-article">
                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <div class="excerpt">
                        <?php the_excerpt();?>
                    </div>
                    <div class="meta">
                     <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span>Publié le <?php the_time('j F Y');?></span></div>
                     <div class="color-line"><span class="featured-author">par <?php the_author_posts_link(); ?></span> <span class="meta-cat"><?php the_category(' ');?></span></div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

        </div>
    
    </div>
    <?php endif;?>    
    <?php wp_reset_query();?>
    
    </div> 
    
    
    <?php include('vlog.php');?>
    
    
    <div class="wrapper-cat">
    
    <canvas id="canvas"></canvas> 
    
    <?php
        
    // Liste des catégories
        
    //var_dump(get_categories());

        
    foreach(get_categories() as $cat):
        
    $argCat = array(
        'post_type'		=> 'post',
        'posts_per_page' => 4,
        'post__not_in' => $featured_posts,
        'category_name' => $cat->slug
    ); 

    $singleCat = new WP_Query( $argCat );
        
    ?>
    
    
    <div class="cat-background cat-gradient <?php echo($cat->slug);?>">        

    <?php if($singleCat->have_posts() ): ?>
    
    <div class="wrapper wrapper-plus home-latests-articles">
        
        <div class="hgroup-cat">
            <h1><?php echo $cat->name; ?></h1>
            <p><?php echo $cat->description; ?></p>
        </div>
        

        <div class="wrapper-articles">

        <?php while($singleCat->have_posts() ) : $singleCat->the_post(); ?>

            <div class="format format-<?php the_field('format_souhaite');?>">

                <a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail('large1000'); ?></a>
                    <div class="wrap-content-article">
                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <div class="excerpt">
                        <?php the_excerpt();?>
                    </div>
                    <div class="meta">
                     <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span>Publié le <?php the_time('j F Y');?></span></div>
                     <div class="color-line"><span class="featured-author">par <?php the_author_posts_link(); ?></span> <span class="meta-cat"><?php the_category(' ');?></span></div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

        </div>
        
        <div class="wrap-bt">
            <a href="<?php echo get_category_link($cat->term_id); ?>" class="bt">Voir tous les articles</a>
        </div>
    
    </div>
    <?php endif;?>    
            
    </div>
    
    <?php endforeach; ?>
    
    </div>

    
<?php get_footer(); ?>