<?php get_header(); ?>
<div class="wrapper-cat wrapper-event">
    
    <div class="cat-background cat-event">        

    <?php if(have_posts() ): ?>
    
    <div class="wrapper">
        
        <div class="hgroup-cat">
            <h1>Events</h1>
            <p>Vos événements à Strasbourg</p>
        </div>
        

        <div class="wrapper-articles">

        <?php while(have_posts() ) : the_post(); ?>

            <div class="format format-normal">
                <?php 
                    $couverture = get_field('couverture');
                ?>
                <div class="thumb"><img src="<?php echo $couverture['sizes']['large600']; ?>"/></div>
                <div class="wrap-content-article">
                    <h2><?php the_title();?></h2>
                    <div class="meta-event">
                        <p><?php the_field('date_de_debut');?>, <?php the_field('heure_de_debut');?></p>
                    </div>
                    <p class="lien-event"><a href="#">En savoir plus</a></p>
                </div>                  
                                            
            </div>  
            
                                          <div class="event-details">
                    <div class="wrapper">
                        <div>
                            <img src="<?php echo $couverture['sizes']['large600_nocrop']; ?>"/>
                        </div>
                        <div class="content-event-details">
                            <h2><?php the_title();?></h2>
                            <p class="date"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php the_field('date_de_debut');?> <?php the_field('heure_de_debut');?> - <?php the_field('date_de_fin'); ?> <?php the_field('heure_de_fin');?></p>
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
                    </div>
                </div>              
            

        <?php endwhile; ?>

        </div>
        
        <?php get_template_part('pagination'); ?>
    
    </div> 
           
    <?php endif;?> 
            
    </div>
</div>

<?php get_footer(); ?>