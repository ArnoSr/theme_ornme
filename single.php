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
                    <span class="author-title">Chef du monde</span>
                    <div class="meta"><?php the_time('j F Y');?></div>
                    
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
    
    <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); ?>






			

			



	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
	
	</article>

<?php get_footer(); ?>
