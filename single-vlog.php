<?php get_header(); ?>
   
   	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   	
   	<div class="wrapper-single-vlog">
    
        <div class="wrapper">
        
            <div class="content-single-vlog">
                <article>
                   <div class="video">
                       <?php the_field('video');?>
                   </div>
                   <h1><?php the_title();?></h1>
                   <p class="author-vlog">par <?php the_author_posts_link(); ?></p>
   
                    <?php the_content();?>
                    
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
                    
                    <?php

                    $post_object = get_field('article_lie');

                    if( $post_object ): 

                        // override $post
                        $post = $post_object;
                        setup_postdata( $post ); 

                        ?>
                        <div class="article-vlog">
                           
                           <p class="title-article-vlog">Lire l'article</p>
                           
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
                        </div>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                    
                </article>
        
                <aside>
                    <p class="aside-titre">À voir également</p>
                </aside>
            </div>

        </div>

   </div>
    <?php endwhile; ?>
    <?php endif; ?>
    
    <div class="single-vlog-entretiens">
    
    <?php
       $argvlog = array(
        'post_type'		=> 'vlog',
        'meta_query' => array(
            array(
                'key' => 'entretiens',
                'compare' => '==',
                'value' => '1'
            )
        )
        
    ); 

    $entretiens = new WP_Query( $argvlog );
        
    ?>
    
    <?php if( $entretiens->have_posts() ): ?>
  
    <div class="hgroup-cat wrapper">
        <h2 class="h1-like">Entretiens</h2>
        <p>On vous donne la parole</p>
    </div>

    <div class="slider-position">
        <div class="wrapper-vlog wrapper vlog-slider-3">

        <?php while( $entretiens->have_posts() ) : $entretiens->the_post(); ?>

            <div class="single-vlog">
                <a class="thumb-vlog" href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
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
    </div>

    
    <?php endif;?>
    
    <?php wp_reset_query(); ?>
        
    </div>
    
        <div class="single-vlog-cross">
    
    <?php
       $argvlog = array(
        'post_type'		=> 'vlog',        
    ); 

    $recentes = new WP_Query( $argvlog );
        
    ?>
    
    <?php if( $recentes->have_posts() ): ?>
  
        <div class="vlog-latest">
        
        <div class="hgroup-cat-vlog wrapper">
            <h2>Vidéos récentes</h2>
        </div>
        <div class="slider-position">
            <div class="vlog-slider-4 wrapper-vlog wrapper">

            <?php while($recentes->have_posts() ) : $recentes->the_post(); ?>

                <div class="single-vlog">
                    <a class="thumb-vlog" href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
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
        </div>
    
    </div>
    <?php endif;?>   
           
    <p class="txtcenter">PUB</p> 
           
               <?php 
        // Dernières vidéos
        if($recentes->have_posts() ): ?>
    
    <div class="vlog-latest">
        
        <div class="hgroup-cat-vlog wrapper">
            <h2>Les plus populaires</h2>
        </div>
        <div class="slider-position">
            <div class="vlog-slider-4 wrapper-vlog wrapper">

            <?php while($recentes->have_posts() ) : $recentes->the_post(); ?>

                <div class="single-vlog">
                    <a class="thumb-vlog" href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
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
        </div>
    
    </div>
    
    <?php endif;?>
    
    <?php wp_reset_query(); ?>
        
    </div>

<?php get_footer(); ?>