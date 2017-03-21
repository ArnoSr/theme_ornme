<?php get_header(); ?>
    
    <div class="tag-background">  

    <?php if(have_posts() ): ?>
    
        <div class="wrapper">

            <div class="hgroup-cat">
                <h1>Auteur</h1>
                <p><?php echo get_the_author() ; ?></p>          
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

    <?php include('snippets/vlog.php');?>

<?php get_footer(); ?>

