<?php get_header(); ?>
    
    <div class="archive-vlog cat-vlog">
    
    <?php
        
    // Vlog featured
        
    $argvlog = array(
        'post_type'		=> 'vlog',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'video_en_avant',
                'compare' => '==',
                'value' => '1'
            )
        )
    ); 

    $entretiens = new WP_Query( $argvlog );
        
    ?>
    
    <?php if( $entretiens->have_posts() ): ?>

    <div class="wrapper">

    <?php while( $entretiens->have_posts() ) : $entretiens->the_post(); ?>
        <a class="vlog-avant" href="<?php the_permalink();?>" style="background-image: url('<?php the_post_thumbnail_url();?>');">
           <p class="alaune">Vidéo à la une</p>
            <h2><?php the_title();?></h2>
            <div class="icon-vlog">
                <svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-btn_play"></use></svg>
                <p>Voir la vidéo</p>
            </div>
            
        </a>

    <?php endwhile; ?>
    </div>
    
    <?php endif;?>
    
    <?php wp_reset_query(); ?>
    
    <?php
        
    // Vlog
        
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
    
    <?php
        if(have_posts() ){
            
            $nbpost = 0;
            
            while(have_posts() ){
                the_post();
                $nbpost++;
            }
        }
    ?>
    
    <?php 
    // Dernières vidéos
    if(have_posts() AND $nbpost >= 4 ): ?>
    
    <div class="vlog-latest">
        
        <div class="hgroup-cat-vlog wrapper">
            <h2>Vidéos récentes</h2>
        </div>
        <div class="slider-position">
            <div class="vlog-slider-4 wrapper-vlog wrapper">

            <?php while(have_posts() ) : the_post(); ?>

                <?php include('snippets/format-vlog.php'); ?>

            <?php endwhile; ?>
            </div>
        </div>
    
    </div>
    <?php endif;?> 
         
           
    <?php
       $argvlog = array(
        'post_type'		=> 'vlog',
        'meta_key'			=> 'nombre_vue',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC'
    ); 
    
    $populaires = new WP_Query( $argvlog );
        
    if($populaires->have_posts() ){

        $nbpost = 0;

        while($populaires->have_posts() ){
            $populaires->the_post();
            $nbpost++;
        }
    }
        
    if($populaires->have_posts() AND $nbpost >= 4 ): ?>
    
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
            
    </div>

<?php get_footer(); ?>
