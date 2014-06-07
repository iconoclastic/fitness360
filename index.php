<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="the-content">
		<div class="uk-container uk-container-center">
			<?php the_content(); ?>	
		</div><!-- container Finished -->
	</div><!-- Content Finished -->		
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>