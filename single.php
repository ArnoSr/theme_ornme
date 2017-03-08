<?php get_header(); ?>
   
   	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   	
   	<?php $cat = get_the_category(); ?>
   	
   	<article class="wrapper-single-article <?php echo $cat[0]->slug; ?>">
    
    <div class="featured-post" style="background-image: url('<?php the_post_thumbnail_url();?>');">
      
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
    
    <div class="wrapper grid has-gutter-xl single-article">
        <div class="wrapper-article two-thirds">
            <?php the_content(); ?>
        </div>
        <div class="sidebar-article one-third">
            pub
        </div>
    </div>
    
    <div class="wrapper">
        <div class="list-tag three-quarters center">
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
        <div class="three-quarters center author-footer">
            <div class="image-circle">
                <?php echo get_avatar(get_the_author_meta('user_email')); ?>
            </div>
            <div class="author-text">
                <span class="author-name"><?php the_author_posts_link(); ?></span>
                <span class="author-title"><?php the_author_meta('titre_poste'); ?></span>
                <p><?php the_author_meta('description'); ?></p>
            </div>
        </div>
    </div>

	<?php endwhile; ?>
	
	
    <?php

    $argFeaturedPost = array(
        'post_type'		=> 'post',
        'posts_per_page' => 2,
        'cat' => $cat[0]->slug,
        'post__not_in' => array($post->ID)
    ); 

    $featuredPost = new WP_Query( $argFeaturedPost );

    ?>

    <?php if( $featuredPost->have_posts() ): ?>
    
	<div class="more-article">
	    <div class="wrapper">
	        <p class="more-title">Encore + <?php echo $cat[0]->name;?></p>
	        <div class="grid has-gutter-xl">
	        <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
	        <div class="format-third one-third">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('large1000'); ?></a>
	            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	            <div class="excerpt">
	                <?php the_excerpt();?>
	            </div>
	           <div class="meta">
                 <div><span><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-clock"></use></svg> <?php or_temps_lecture(get_the_content());?></span> <span><?php the_time('j F Y');?></span></div>
                <div><span class="featured-author">par <?php the_author_posts_link(); ?></span> <span class="featured-category name-category <?php echo $cat[0]->slug; ?>"><?php the_category(' ');?></span></div>
               </div>
	        </div>
	        <?php endwhile;?>
	        </div>
	    </div>
	</div>
    
    <?php endif;?>
   
   </article>
    
    <?php endif; ?>

<?php get_footer(); ?>