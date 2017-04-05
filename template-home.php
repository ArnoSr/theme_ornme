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
    

        <?php if (has_post_thumbnail() && !post_password_required()): ?>
        
        <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_large_array = wp_get_attachment_image_src($thumb_id, 'large1920', true);
            $thumb_url_large = $thumb_url_large_array[0];
            $thumb_url_medium_array = wp_get_attachment_image_src($thumb_id, 'large1400', true);
            $thumb_url_medium = $thumb_url_medium_array[0];
            $thumb_url_small_array = wp_get_attachment_image_src($thumb_id, 'large900', true);
            $thumb_url_small = $thumb_url_small_array[0];
            $thumb_url_tiny_array = wp_get_attachment_image_src($thumb_id, 'large600', true);
            $thumb_url_tiny = $thumb_url_tiny_array[0];
        ?>

		<style type="text/css">

		@media only screen and (min-width: 1500px){
			.featured-post{
				background-image: url('<?php echo $thumb_url_large; ?>');
			}
		}

		@media only screen and (min-width: 800px) and (max-width: 1499px){
			.featured-post{
				background-image: url('<?php echo $thumb_url_medium; ?>');
			}
		}

		@media only screen and (max-width: 799px) and (min-width: 500px){
			.featured-post{
				background-image: url('<?php echo $thumb_url_small; ?>');
			}
		}

		@media only screen and (max-width: 499px){
			.featured-post{
				background-image: url('<?php echo $thumb_url_tiny; ?>');
			}
		}
			
	</style>
  
  <?php endif; ?>
   
    
    <?php array_push($featured_posts, get_the_ID()); ?>
    
    <div class="featured-post">
      
       <div class="wrapper">
          
          <div class="content-featured-post">
           
            <p class="h2-like featured-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
            <p class="featured-excerpt"><a href="<?php the_permalink();?>"><?php the_excerpt();?></a></p>
               
           <?php $cat = get_the_category(); ?>

           <div class="meta">
               <p><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg><span><?php or_temps_lecture(get_the_content());?></span><span class="featured-author">par <?php the_author_posts_link(); ?></span><span><?php the_time('j F Y');?></span><span class="featured-category name-category <?php echo $cat[0]->slug; ?>"><?php the_category(' ');?></span></p>
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
    
        <div class="wrapper wrapper-plus big-featured">
        <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
            
            <?php array_push($featured_posts, get_the_ID()); ?>

            <div class="format-third featured-home <?php echo(get_the_category()[0]->slug);?>">

                <div class="bg-category-title"><?php echo(get_the_category()[0]->name);?></div>
                <a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail('large600'); ?></a>
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
            
            <?php if(shortcode_exists('bsa_pro_ad_space')): ?>

            <div class="featured-pub">
                <div class="bg-category-title">Annonce</div>
                <?php echo(do_shortcode('[bsa_pro_ad_space id=2]', true)); ?>
            </div>
            
            <?php endif;?>
        </div>
    
    <?php endif;?>    
    <?php wp_reset_query();?>

   
    <?php
        
    // Derniers articles

    $argLastPosts = array(
        'post_type'		=> 'post',
        'posts_per_page' => 8,
        'post__not_in' => $featured_posts,
    ); 

    $LastPosts = new WP_Query( $argLastPosts );

    ?>

    <?php if( $LastPosts->have_posts() ): ?>
    
    <div class="wrapper wrapper-plus home-latests-articles">
        
        <span class="title-discret">Articles les plus récents</span>

        <div class="wrapper-articles">

        <?php while( $LastPosts->have_posts() ) : $LastPosts->the_post(); ?>
            
            <?php include('snippets/format-article.php'); ?>

        <?php endwhile; ?>

        </div>
    
    </div>
    <?php endif;?>    
    <?php wp_reset_query();?>
    
    </div> 
    
    <?php include('snippets/vlog.php');?>
    
    <div class="wrapper-cat">
    
        <canvas id="canvas"></canvas>
    

        <?php

        // Liste des catégories

        foreach(get_categories() as $cat):
        
        ?>     


        <?php
        
                // Compter le nb à afficher
        $argCat = array(
            'post_type'		=> 'post',
            'posts_per_page' => 4,
            'post__not_in' => $featured_posts,
            'category_name' => $cat->slug
        ); 

        $singleCat = new WP_Query( $argCat );
        
        $simple = 0;
        $double = 0;
        $nombre = 0;

        if($singleCat->have_posts()):
            
        
        
        ?>

        <div class="cat-background cat-gradient <?php echo($cat->slug);?>"> 
            
            <?php
            
                while($singleCat->have_posts() ){
                $singleCat->the_post();
                if(get_field('format_souhaite') != 'largeurdouble'){
                    $simple += 1;
                    $nombre += 1;
                }else{
                    $double += 1;
                    $nombre += 2;
                }
                
                // Les cas simples
                if($nombre == 4){
                    if($double == 1){
                        $nbPosts = 3;
                        break;
                    }else if($double == 2){
                        $nbPosts = 2;
                        break;
                    }else if($double == 0){
                        $nbPosts = 4;
                    }
                
                // Les cas où il faut forcer
                }else if($nombre > 4){
                    
                    if($double == 1){
                       $nbPosts = 4;
                        echo('<input type="hidden" name="force_format"/>');
                        break;
                    }else if($double == 2){
                        $nbPosts = 3;
                        echo('<input type="hidden" name="force_format"/>');
                        break;
                    }
                }
            }
            
                //Afficher les posts
                $argCat = array(
                    'post_type'		=> 'post',
                    'posts_per_page' => $nbPosts,
                    'post__not_in' => $featured_posts,
                    'category_name' => $cat->slug
                ); 

                $singleCat = new WP_Query( $argCat );

            ?>       

            <?php if($singleCat->have_posts() ): ?>

            <div class="wrapper wrapper-plus home-latests-articles">

                <div class="hgroup-cat">
                    <h1><?php echo $cat->name; ?></h1>
                    <p><?php echo $cat->description; ?></p>
                </div>


                <div class="wrapper-articles">

                <?php while($singleCat->have_posts() ) : $singleCat->the_post(); ?>
                    <?php include('snippets/format-article.php'); ?>
                <?php endwhile; ?>

                </div>

                <div class="wrap-bt">
                    <a href="<?php echo get_category_link($cat->term_id); ?>" class="bt">Voir tous les articles</a>
                </div>

            </div>
            <?php endif;?>    

        </div>
        
        <script>
            jQuery('[name="force_format"]').parent().find('.wrapper-articles .format:last-child').removeClass('format-largeurdouble').addClass('format-normal');
        </script>
        
        <?php endif;?>

        <?php endforeach; ?>
    
    </div>
    
<?php get_footer(); ?>