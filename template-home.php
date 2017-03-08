<?php /* Template Name: Home template */ get_header(); ?>
    
    <?php

    $argFeaturedPost = array(
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

    $featuredPost = new WP_Query( $argFeaturedPost );

    ?>

    <?php if( $featuredPost->have_posts() ): ?>
    <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
    
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
    
    <?php

    $argFeaturedPost = array(
        'post_type'		=> 'post',
        'posts_per_page' => 2,
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
    <div class="wrapper-article-home">
    <div class="wrapper wrapper-plus grid has-gutter-xl">
    <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
    
<div class="format-third one-third featured-home <?php echo(get_the_category()[0]->slug);?>">
   
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
    </div>
    <?php endif;?>
    
    <?php wp_reset_query();?>
    
    

<?php get_footer(); ?>
