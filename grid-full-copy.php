<div class="uk-container uk-container-center <?php $term = $wp_query->queried_object; echo $term->slug; ?>"> 
	<div class="uk-grid the-archive">
	<?php global $more; while ( have_posts() ) : the_post(); ?>
		<div class="the-grid uk-width-medium-1-2">
			<div class="margin-fix">
				<?php if(get_field('thumbnail')) : ?> 
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?> Thumbnail" class="alignright the-archive-thumbnail"></a>	
				<?php endif; ?>
				<h2 class="<?php if(!get_field('thumbnail')) {echo "no-thumbnail";} ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
				<div class="before-more">
					<?php the_content( '', false ); ?>
				</div><!-- Before More Finished -->
				<div class="after-more">
					<?php 
						$aftermore = 11 + strpos($post->post_content, '<!--more-->'); 
						echo substr($post->post_content,$aftermore);
					?> 				
				</div><!-- After More Finished --> 
				<i class="uk-icon-plus-circle the-more">See More</i>
			</div><!-- Margin Fix Finished -->
		</div><!-- The Grid Finished -->
	<?php endwhile; wp_reset_query(); ?>
	</div><!-- Grid Finished -->
	<?php if($term->slug == 'our-classes') : ?>
		<div class="uk-container-center uk-text-center">
			<a href="http://clients.mindbodyonline.com/ws.asp?studioid=25679&amp;stype=-99" class="sky-button sign-up">SIGN UP FOR CLASSES</a>		
		</div>
	<?php endif; ?>	
</div><!-- Container Finished -->