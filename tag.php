<?php get_header(); ?>
    
    <div class="tag-background">  

    <?php if(have_posts() ): ?>
    
    <div class="wrapper wrapper-plus home-latests-articles">
        
        <div class="hgroup-cat">
            <h1>Tags</h1>
            <p>#<?php single_cat_title(); ?></p>
        </div>
        

        <div class="wrapper-articles">

        <?php while(have_posts() ) : the_post(); ?>
      
           <?php 
                if(get_post_type() == 'post'){
                   include('snippets/format-article.php');
                }

                if(get_post_type() == 'vlog'){
                   include('snippets/format-vlog.php'); 
                }
            ?>
            
            <?php endwhile; ?>

        </div>
        
        <?php get_template_part('pagination'); ?>
    
    </div>
    <?php endif;?>
    <?php wp_reset_query();?>
    
</div>   

    <?php //include('snippets/vlog.php');?>

<?php get_footer(); ?>
