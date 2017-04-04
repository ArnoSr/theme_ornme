    <?php
        
    // Vlog
        
    $argvlog = array(
        'post_type'	=> 'vlog',
        'posts_per_page' => 3,
    ); 

    $vlogquery = new WP_Query($argvlog);
        
    ?>
    
    
    <div class="cat-background cat-vlog">        

        <?php if($vlogquery->have_posts() ): ?>

        <div class="wrapper">

            <div class="hgroup-cat">
                <h1>Vlog</h1>
                <p>Nos photos & vidéos</p>
            </div>


            <div class="wrapper-vlog">

            <?php while($vlogquery->have_posts() ) : $vlogquery->the_post(); ?>

                <?php include('format-vlog.php'); ?>

            <?php endwhile; ?>

            </div>

            <div class="wrap-bt">
                <a href="<?php echo get_site_url();?>/vlog" class="bt">Voir toutes les vidéos</a>
            </div>

        </div>
        <?php endif;?>    
            
    </div>