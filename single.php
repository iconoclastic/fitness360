<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php if(has_post_thumbnail()) : ?>
		<div class="the-inner-banner">
			<?php the_post_thumbnail('featured'); ?>
			<div class="the-inner-title uk-vertical-align-middle uk-container-center">
				<div class="the-inner-title-meta">
					<span class="the-title"><?php the_title(); ?></span>
					<?php 
						$subtitle = get_field('subtitle');
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
					$subtitle = get_field('customer_job_title');
					if($subtitle) :
				?>				
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-preserve" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
					<div class="no-img-title uk-panel">
						<?php the_title(); ?>
					</div><!-- No Image Title Finished -->
					<div class="no-img-subtitle  uk-panel">
						<?php echo $subtitle; ?>						
					</div><!-- No Image Subtitle Finished -->
				</div><!-- Grid Finished -->
				<?php else : ?>	
				<div class="uk-grid  uk-grid-preserve">
					<div class="no-img-title no-sub-img-title uk-panel">
						<?php the_title(); ?>
					</div><!-- No Image Title Finished -->
				</div><!-- Grid Finished -->			
				<?php endif; ?>		
			</div><!-- No Image Container Finished -->
		</div><!-- No Image Banner Finished -->
	<?php endif; ?>	
	<div class="the-content">
		<div class="uk-container uk-container-center">
			<?php if(get_field('thumbnail')) : ?>
				<img src="<?php the_field('thumbnail') ?>" alt="<?php the_title(); ?>" class="alignleft inside-thumb" style="max-width: 222px;">
			<?php endif; ?>
			<?php the_content(); ?>	
		</div><!-- container Finished -->
	</div><!-- Content Finished -->		
<?php endwhile; wp_reset_query(); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>