<?php get_header(); ?>
    
    <div class="tag-background">  

    <?php if(have_posts() ): ?>
    
        <div class="wrapper">

            <div class="hgroup-cat">
                <h1>Recherche</h1>
                <p><?php echo sprintf( __( '%s résultats pour "', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>"</p>          
            </div>    

            <div class="wrapper-articles">

            <?php while(have_posts() ) : the_post(); ?>
                
                <?php if(get_post_type() == 'vlog'){
                    include('snippets/format-vlog.php');
                }elseif(get_post_type() == 'post'){
                    include('snippets/format-article.php');
                }else{
                    
                }
                
                ?>

                <?php  ?>

            <?php endwhile; ?>

            </div>

            <?php get_template_part('pagination'); ?>

        </div>
        <?php else:?>
        
        <div class="wrapper">
           <div class="hgroup-cat">
                <h1>Recherche</h1>
                <p><?php echo sprintf( __( '%s résultats pour "', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>"</p>           
            </div> 
            
            <div class="form-no-result">
                <?php get_search_form(); ?>
            </div>
            
        </div>
        
        <?php endif;?> 

    </div>

<?php get_footer(); ?>

