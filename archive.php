<?php get_header(); ?>
<?php 
	$current_term_id = get_queried_object()->term_id; 
	$the_image = get_field('page-cat-banner-image', 'mwi_categories_'.$current_term_id); 
	$the_title = get_field('page-cat-title', 'mwi_categories_'.$current_term_id);
	$subtitle = get_field('page-cat-subtitle', 'mwi_categories_'.$current_term_id);
?>
<?php if(!empty($the_image)) : ?>
	<div class="the-inner-banner">
		<img width="1200" height="530" src="<?php echo $the_image ?>" class="attachment-featured wp-post-image" alt="Content Banner">
		<div class="the-inner-title uk-vertical-align-middle uk-container-center">
			<div class="the-inner-title-meta">
				<span class="the-title"><?php echo $the_title ?></span>
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
					<?php echo $the_title ?>
				</div><!-- No Image Title Finished -->
				<div class="no-img-subtitle  uk-panel">
					<?php echo $subtitle; ?>						
				</div><!-- No Image Subtitle Finished -->
			</div><!-- Grid Finished -->
			<?php else : ?>	
			<div class="uk-grid  uk-grid-preserve">
				<div class="no-img-title no-sub-img-title uk-panel"> 
					<?php echo $the_title ?>
				</div><!-- No Image Title Finished -->
			</div><!-- Grid Finished -->			
			<?php endif; ?>		
		</div><!-- No Image Container Finished -->
	</div><!-- No Image Banner Finished -->
<?php endif; ?>	
<?php 
	$term = get_terms('mwi_categories');
	the_field('page-cat-title');
	$the_layout = get_field('page-cat-layout', 'mwi_categories_'.$current_term_id); 
	if ($the_layout == 'no-copy') {
		get_template_part( 'grid', $the_layout );
	} else if ($the_layout == 'short-copy') {
		get_template_part( 'grid', $the_layout );
	} else {
		get_template_part( 'grid', $the_layout );
	}
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?> 