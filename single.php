<?php get_header(); ?>
   
   	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   	
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
            
                    <?php if(get_field('alignement_de_limage')): ?>
            
            .featured-post{
                background-position: <?php the_field('alignement_de_limage');?> center;
            }
            
        <?php endif;?>
			
	</style>
  
  <?php endif; ?>
   	
   	<?php $cat = get_the_category(); ?>
   	
   	<article class="wrapper-single-article <?php echo $cat[0]->slug; ?>">
    
    <div class="featured-post">
      
       <div class="wrapper">
            <p class="h1-like featured-title"><?php the_title();?></p>
            <div class="article-author-top">
                <div class="image-circle">
                    <?php echo get_avatar(get_the_author_meta('user_email')); ?>
                </div>
                <div class="author-text">
                    <span class="author-name"><?php the_author_posts_link(); ?></span>
                    <span class="author-title"><?php the_author_meta('titre_poste'); ?></span>
                    <div class="meta"><span><?php the_time('j F Y');?></span> <span><?php or_temps_lecture(get_the_content()); ?> de lecture</span></div>
                    
                </div>
            </div>

       </div>
    </div>
    
    <div class="tps-lecture">
        <div class="barre-tps-lecture"></div>
        <div class="reste-tps-lecture wrapper"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> Temps restant : <?php or_temps_minute_lecture(get_the_content()); ?> min</div>
    </div>
    
    
    <div class="wrapper single-article">
        <div class="wrapper-article">
            
            <?php include('snippets/social.php'); ?>
            <?php the_content(); ?>
        </div>
        <aside class="sidebar-article">
                        <?php if(shortcode_exists('bsa_pro_ad_space')): ?>

                <?php echo(do_shortcode('[bsa_pro_ad_space id=3]', true)); ?>
            
            <?php endif;?>
        </aside>
    </div>
    
    <div class="wrapper">
        <div class="list-tag">
            <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    echo '<ul>';
                    foreach($posttags as $tag) {
                        echo '<li><a href="'.get_tag_link($tag->term_id).'">#'.$tag->name.'</a></li>'; 
                    }
                    echo '</ul>';
                }
            ?>
        </div>
        <div class="author-footer">
            <div class="image-circle">
                <?php echo get_avatar(get_the_author_meta('user_email')); ?>
            </div>
            <div class="author-text">
                <span class="author-name"><?php the_author_posts_link(); ?></span>
                <span class="author-title"><?php the_author_meta('titre_poste'); ?></span>
                <p class="author-description"><?php the_author_meta('description'); ?></p>
            </div>
        </div>
    </div>

	<?php endwhile; ?>
	
	
    <?php

    $argFeaturedPost = array(
        'post_type'		=> 'post',
        'posts_per_page' => 3,
        'category_name' => $cat[0]->slug,
        'post__not_in' => array($post->ID)
    ); 

    $featuredPost = new WP_Query( $argFeaturedPost );

    ?>

    <?php if( $featuredPost->have_posts() ): ?>
    
	<div class="more-article">
	    <div class="wrapper">
	        <p class="more-title">Encore + <?php echo $cat[0]->name;?></p>
	        <div class="more-wrapper big-featured">
	        <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
            <div class="format-third featured-home <?php echo(get_the_category()[0]->slug);?>">
                <a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail('large1000'); ?></a>
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <div class="excerpt">
                    <?php the_excerpt();?>
                </div>
                <div class="meta">
                 <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span class="featured-author">par <?php the_author_posts_link(); ?></span> <span>Publié le <?php the_time('j F Y');?></span></div>
                </div>
            </div>
	        <?php endwhile;?>
	        </div>
	    </div>
	</div>
    
    <?php endif;?>
   
   </article>
    
    <?php endif; ?>
    
    <?php include('snippets/vlog.php');?>

<?php get_footer(); ?>