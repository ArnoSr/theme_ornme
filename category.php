<?php get_header(); ?>
       <div class="wrapper-cat">
    
    <?php
if(is_category()) {
	$category = get_query_var('cat');
	$current_cat = get_category($cat);
}
?>
    
    <div class="cat-background cat-gradient <?php echo $current_cat->slug;?>">        

    <?php if(have_posts() ): ?>
    
    <div class="wrapper">
        
        <div class="hgroup-cat">
            <h1><?php single_cat_title(); ?></h1>
            <?php echo category_description(); ?>
        </div>
        

        <div class="wrapper-articles">

        <?php while(have_posts() ) : the_post(); ?>

            <?php include('snippets/format-article.php'); ?>

        <?php endwhile; ?>

        </div>
        
        <?php get_template_part('pagination'); ?>
    
    </div>
    <?php endif;?>    
            
    </div>
</div>
    <?php include('snippets/vlog.php');?>

<?php get_footer(); ?>
