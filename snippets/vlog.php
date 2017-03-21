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


            <div class="wrapper-vlog">

            <?php while($vlog->have_posts() ) : $vlog->the_post(); ?>

                <?php include('format-vlog.php'); ?>

            <?php endwhile; ?>

            </div>

            <div class="wrap-bt">
                <a href="vlog" class="bt">Voir toutes les vidéos</a>
            </div>

        </div>
        <?php endif;?>    
            
    </div>