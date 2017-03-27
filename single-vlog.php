<?php get_header(); ?>
   
   	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   	
   	
    <?php 
        $array_tags = wp_get_post_tags($post->ID);
        $tag_array = array();

        foreach($array_tags as $tag){
            array_push($tag_array, $tag->term_id);
        }
    ?>
   	
   	<div class="wrapper-single-vlog">
    
        <div class="wrapper">
        
            <div class="content-single-vlog">
                <article>
                   <div class="video">
                       <?php the_field('video');?>
                   </div>
                   <h1><?php the_title();?></h1>
                   <p class="author-vlog">par <?php the_author_posts_link(); ?></p>
   
                       <?php include('snippets/social.php'); ?>
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
                           
                            <div class="<?php echo(get_the_category()[0]->slug);?> format">
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
                    
                    
                    
                    <?php
                       $argvlog = array(
                        'post_type'		=> 'vlog',
                        'tag__in' => $tag_array,
                        'meta_key'			=> 'nombre_vue',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC',
                        'posts_per_page' => 3
                    ); 

                    $populaires = new WP_Query( $argvlog );

                        // Dernières vidéos
                        if($populaires->have_posts() ): ?>

                    <div class="">

                        <?php while($populaires->have_posts() ) : $populaires->the_post(); ?>

                            <?php include('snippets/format-vlog.php'); ?>

                        <?php endwhile; ?>
        
                    </div>

                    <?php endif;?>

                    <?php wp_reset_query(); ?>
                    
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

            <?php include('snippets/format-vlog.php'); ?>

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

                <?php include('snippets/format-vlog.php'); ?>

            <?php endwhile; ?>
            </div>
        </div>
    
    </div>
    <?php endif;?>   
           
    <p class="txtcenter">PUB</p> 
           
    <?php
       $argvlog = array(
        'post_type'		=> 'vlog',
        'meta_key'			=> 'nombre_vue',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC'
    ); 

    $populaires = new WP_Query( $argvlog );
        
        // Dernières vidéos
        if($populaires->have_posts() ): ?>
    
    <div class="vlog-latest">
        
        <div class="hgroup-cat-vlog wrapper">
            <h2>Les plus populaires</h2>
        </div>
        <div class="slider-position">
            <div class="vlog-slider-4 wrapper-vlog wrapper">

            <?php while($populaires->have_posts() ) : $populaires->the_post(); ?>

                <?php include('snippets/format-vlog.php'); ?>

            <?php endwhile; ?>
            </div>
        </div>
    
    </div>
    
    <?php endif;?>
    
    <?php wp_reset_query(); ?>
        
    </div>
    
    <?php 
        //Incrémenter compteur vue

        $nb_vue = get_field('nombre_vue');
        if($nb_vue == ''){
            $nb_vue = 0;
        }
        $nb_vue++;
        update_field('nombre_vue', $nb_vue, $post->ID);
        
    ?>

<?php get_footer(); ?>