<div class="uk-container uk-container-center">
	<div class="uk-grid the-archive">
	<?php global $more; while ( have_posts() ) : the_post(); ?>
		<div class="the-grid uk-width-medium-1-2">
			<div class="margin-fix" style="min-height: 196px;">
				<?php if(get_field('thumbnail')) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img style="width: auto;" src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?> Thumbnail" class="alignright the-archive-thumbnail"></a>	
				<?php endif; ?> 
				<h2 class="<?php if(!get_field('thumbnail')) {echo "no-thumbnail";} ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="before-more">
					<?php $the_content = apply_filters('the_content',get_the_content( '', true)); echo substr($the_content, 0, 75)." ..."; ?>
				</div><!-- Before More Finished -->
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