<?php get_header(); ?>
   
   
   
    <?php 

        $argEvent = array(
            'post_type' => 'evenement',
            'meta_key' => 'timestamp_debut',
	        'orderby' => 'meta_value_num',
            'order' => 'ASC'
        ); 

        $events = new WP_Query( $argEvent );

        if($events->have_posts() ):

    ?>
    
    
<div class="wrapper-cat wrapper-event">
    
    <div class="cat-background cat-event">        


    
    <div class="wrapper">
        
        <div class="hgroup-cat">
            <h1>Events</h1>
            <p>Vos événements à Strasbourg</p>
        </div>
        

        <div class="wrapper-articles">

        <?php while($events->have_posts() ) : $events->the_post(); ?>

            <?php
                if(get_field('date_de_fin')){
                    $dateFin = get_field('date_de_fin');
                }else{
                    $dateFin = get_field('date_de_debut');
                }
                // si la date de fin de l'event + 1jour est supérieur à la date du jour
                if((strtotime($dateFin) + 86400) > strtotime('today UTC')):            
            ?>

            <div class="format format-normal article-event" data-slug="data<?php echo($post->ID);?>">
                <?php 
                    $couverture = get_field('photo_ou_video');
                ?>
                <div class="thumb"><img src="<?php echo $couverture['sizes']['large600']; ?>"/></div>
                <div class="wrap-content-article">
                    <h2><?php the_title();?></h2>
                    <div class="meta-event">
                        <p><?php echo date("l j F o", strtotime(get_field('date_de_debut')));?> à <?php the_field('heure_de_debut');?><br><?php the_field('adresse');?></p>
                    </div>
                    <p class="lien-event" data-slug="data<?php echo($post->ID);?>"><a href="#">En savoir plus</a></p>
                </div>                                       
            </div>  
            
            <?php endif;?>

        <?php endwhile; ?>

        </div>
        
        <?php get_template_part('pagination'); ?>
    
    </div> 
          
    </div>
</div>

        <div class="article-ouvert">

        <?php while($events->have_posts() ) : $events->the_post(); ?>

       
                <?php 
                    $couverture = get_field('photo_ou_video');
                    
                ?>
                
                   
                <div class="event-details" data-slug="data<?php echo($post->ID);?>">
                   <button class="close"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-close"></use></svg></button>
                    <div class="wrapper">

                    <div class="content-event-details">
                    <h2><?php the_title();?></h2>
                    <p class="date"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php echo date("d/m/Y", strtotime(get_field('date_de_debut')));?> <?php the_field('heure_de_debut');?> - <?php echo date("d/m/Y", strtotime(get_field('date_de_fin')));?> <?php the_field('heure_de_fin');?></p>
                    <p class="adresse"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-pin"></use></svg> <?php the_field('adresse');?>, <?php the_field('ville');?></p>

                    <?php the_field('informations');?>

                    <?php the_field('commentaire');?>

                    <div class="social-event">
                        <?php if(get_field('url_facebook')):?>
                        <a href="<?php the_field('url_facebook');?>"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_facebook"></use></svg></a>
                        <?php endif; ?>
                        <?php if(get_field('url_twitter')):?>
                        <a href="<?php the_field('url_twitter');?>"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-icon_twitter"></use></svg></a>
                        <?php endif; ?>
                        <?php if(get_field('url_evenement')): ?>
                        <a href="<?php the_field('url_evenement');?>"><?php the_field('url_evenement');?></a>
                        <?php endif; ?>
                    </div>

                </div>
                   
                        
                         <?php if(get_field('lien_video')): ?>
                         <div class="video-embed">
                          <div class="embed-container">
                           
                            <?php global $wp_embed;
                            ?>
                           <?php echo($wp_embed->run_shortcode('[embed]'.get_field("lien_video").'[/embed]')); ?>
                           </div>
                           <?php else: ?>

                        
                                                   <img src="<?php echo $couverture['sizes']['large600_nocrop']; ?>"/>
                           <?php endif;?>
                        </div>
                    </div>
                </div> 
                
        <?php endwhile; ?>

        </div>
            <?php endif;?> 

<?php get_footer(); ?>