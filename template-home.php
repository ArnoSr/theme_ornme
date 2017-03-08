<?php /* Template Name: Home template */ get_header(); ?>
    
    <?php

    $argFeaturedPost = array(
        'post_type'		=> 'post',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'mise_en_avant_principale',
                'compare' => '==',
                'value' => '1'
            )
        )
    ); 

    $featuredPost = new WP_Query( $argFeaturedPost );

    ?>

    <?php if( $featuredPost->have_posts() ): ?>
    <?php while( $featuredPost->have_posts() ) : $featuredPost->the_post(); ?>
    
    <div class="featured-post" style="background-image: url('<?php the_post_thumbnail_url();?>');">
      
       <div class="wrapper">
          
          <div class="w50">
            <p class="h2-like featured-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
              <p class="featured-excerpt"><a href="<?php the_permalink();?>"><?php the_excerpt();?></a></p>
               
               <?php $cat = get_the_category(); ?>

               <div class="meta">
                   <p><span><?php or_temps_lecture(get_the_content());?></span><span class="featured-author">par <?php the_author_posts_link(); ?></span><span><?php the_time('j F Y');?></span><span class="featured-category name-category <?php echo $cat[0]->slug; ?>"><?php the_category(' ');?></span></p>
               </div>
          </div>

       </div>
    </div>
    
    <?php endwhile; ?>
    <?php endif;?>
    
    <?php wp_reset_query();?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
