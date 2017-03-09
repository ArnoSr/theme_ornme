<?php get_header(); ?>
    
    <div class="cat-background <?php echo(get_the_category()[0]->slug);?>">        

    <?php if(have_posts() ): ?>
    
    <div class="wrapper wrapper-plus home-latests-articles">
        
        <div class="hgroup-cat">
            <h1><?php single_cat_title(); ?></h1>
            <?php echo category_description(); ?>
        </div>
        

        <div class="wrapper-articles">

        <?php while(have_posts() ) : the_post(); ?>

            <div class="format format-<?php the_field('format_souhaite');?>">

                <a class="thumb-shadow" href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <div class="excerpt">
                    <?php the_excerpt();?>
                </div>
                <div class="meta">
                 <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span>Publié le <?php the_time('j F Y');?></span></div>
                 <div><span class="featured-author">par <?php the_author_posts_link(); ?></span> <span class="meta-cat"><?php the_category(' ');?></span></div>
                </div>
            </div>

        <?php endwhile; ?>

        </div>
    
    </div>
    <?php endif;?>    
            <?php get_template_part('pagination'); ?>
        </div>
        
    </div>

<?php get_footer(); ?>
