<?php get_header(); ?>

	<main role="main">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- section -->
		<section class="wrapper">

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		</section>
		<!-- /section -->
		
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
