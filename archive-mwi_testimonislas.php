<?php get_header(); ?>
<?php 
	$current_term_id = get_queried_object()->term_id; 
	$the_image = get_field('customer_image', 'mwi_testimonislas_'.$current_term_id); 
	$the_name = get_field('customer_name', 'mwi_testimonislas_'.$current_term_id);
	$the_jobtitle = get_field('customer_job_title', 'mwi_testimonislas_'.$current_term_id);
?>
<?php if(!empty($image)) : ?>
	<div class="the-inner-banner">
		<img width="1200" height="530" src="<?php echo $the_image ?>" class="attachment-featured wp-post-image" alt="Content Banner">
		<div class="the-inner-title uk-vertical-align-middle uk-container-center">
			<div class="the-inner-title-meta">
				<span class="the-title">Testimonials</span>
				<?php 
					if($subtitle) :
				?>
					<span class="the-subtitle"><?php echo $subtitle; ?></span> 
					<?php endif; ?>	
			</div><!-- The Inner Title Meta Finished -->	
		</div><!-- The Inner Title Title Finished -->
	</div><!-- The Inner Banner Finished -->
<?php else : ?>	
	<div class="no-img-banner">
		<div class="uk-container-center uk-container">
			<?php 
				if($subtitle) :
			?>				
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-preserve" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
				<div class="no-img-title uk-panel">
					Testimonials
				</div><!-- No Image Title Finished -->
				<div class="no-img-subtitle  uk-panel">
					<?php echo $subtitle; ?>						
				</div><!-- No Image Subtitle Finished -->
			</div><!-- Grid Finished -->
			<?php else : ?>	
			<div class="uk-grid  uk-grid-preserve">
				<div class="no-img-title no-sub-img-title uk-panel"> 
					Testimonials
				</div><!-- No Image Title Finished -->
			</div><!-- Grid Finished -->			
			<?php endif; ?>		
		</div><!-- No Image Container Finished -->
	</div><!-- No Image Banner Finished -->
<?php endif; ?>	
<div class="uk-container uk-container-center testimonials">
	<div class="uk-grid the-archive">
	<?php global $more; while ( have_posts() ) : the_post(); ?>
		<div class="the-grid uk-width-medium-1-2">
			<div class="margin-fix">
				<?php if(get_field('customer_image')) : ?> 
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_field('customer_image'); ?>" alt="<?php the_title(); ?> Thumbnail" class="alignright the-archive-thumbnail"></a>	
				<?php endif; ?>
				<h2 class="<?php if(!get_field('customer_image')) {echo "no-thumbnail";} ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
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
</div><!-- Container Finished -->
<?php get_sidebar(); ?>
<?php get_footer(); ?> 