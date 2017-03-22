<?php /* Template Name: Contact */ get_header(); ?>

	<main role="main" class="contact-page">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- section -->
		<section class="wrapper wrapper-half">
            
            <div>
                <?php the_content(); ?>
            </div>

            <div>
               <h3>Nous contacter</h3>
                <?php echo do_shortcode('[contact-form-7 id="153" title="Formulaire contact"]'); ?>
            </div>
            
		<?php endwhile; ?>

		</section>
		<!-- /section -->
		
		<?php endif; ?>
	</main>

<?php get_footer(); ?>