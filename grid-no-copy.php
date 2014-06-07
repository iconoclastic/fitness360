<div class="uk-container uk-container-center">
	<div class="uk-grid the-archive uk-grid-preserve">
	<?php global $more; while ( have_posts() ) : the_post(); ?>
		<div class="the-grid-no-copy uk-width-medium-1-4">
			<?php if(get_field('thumbnail')) : ?> 
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?> Thumbnail" class="alignright the-archive-thumbnail no-copy"></a>	
			<?php endif; ?>
		</div><!-- The Grid Finished -->
	<?php endwhile; wp_reset_query(); ?>
	</div><!-- Grid Finished -->
	<?php if($term->slug == 'our-classes') : ?>
		<div class="uk-container-center uk-text-center">
			<a href="http://clients.mindbodyonline.com/ws.asp?studioid=25679&amp;stype=-99" class="sky-button sign-up">SIGN UP FOR CLASSES</a>		
		</div>
	<?php endif; ?>	
</div><!-- Container Finished -->