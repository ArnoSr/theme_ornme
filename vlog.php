    <?php
        
    // Vlog
        
    $argvlog = array(
        'post_type'		=> 'vlog',
        'posts_per_page' => 3,
    ); 

    $vlog = new WP_Query( $argvlog );
        
    ?>
    
    
    <div class="cat-background cat-vlog">        

    <?php if($vlog->have_posts() ): ?>
    
    <div class="wrapper">
        
        <div class="hgroup-cat">
            <h1>Vlog</h1>
            <p>Nos photos & vidéos</p>
        </div>


        <div class="grid has-gutter-xl wrapper-vlog">

        <?php while($vlog->have_posts() ) : $vlog->the_post(); ?>

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
        
        <div class="wrap-bt">
            <a href="vlog" class="bt">Voir toutes les vidéos</a>
        </div>
    
    </div>
    <?php endif;?>    
            
    </div>