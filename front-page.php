<?php get_header(); ?>
<?php global $more; ?>
<?php if (has_post_thumbnail()): ?>
	<div class="uk-container-center front-banner">
		<i class="darken"></i>
		<?php the_post_thumbnail('full'); ?>
		<div class="front-banner-description">
			<img src="<?php echo get_field('front-logo'); ?>" alt="Front Banner Logo">
			<?php dynamic_sidebar('front-banner'); ?>
			<i class="uk-icon-chevron-circle-down to-top"></i>			
		</div><!-- Description Finished -->
	</div><!-- Container Finished -->
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="<?php echo get_field('homeAbout'); ?> the-front-content">
		<div class="uk-content uk-content-center">
			<?php the_content('wewewe'); ?>			
		</div><!-- Content Finished -->
	</div><!-- Home Content Finished -->		
<?php endwhile; ?>
<div class="the-classes">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-preserve" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
			<?php dynamic_sidebar('front-class'); ?>			
		</div><!-- Grid Finished -->
	</div><!-- Container Finished -->
</div><!-- The Classes Finished -->
<div class="testimonials-front <?php echo get_field('homeTestimonial'); ?>">
	<div class="uk-container uk-container-center">
		<div class="uk-grid" data-uk-grid-margin>
			<i class="uk-icon-quote-left"></i>
			<?php 
				$args = array('posts_per_page' => 1, 'post_type' => 'mwi_testimonislas');
				$query = new WP_Query($args);
				while ($query->have_posts()) {$query->the_post(); $more = 0; the_content('', false);}
			?>
			<div class="testimonials-front-meta">
				<img style="width: 123px; height: 123px;" src="<?php the_field('customer_image') ?>" alt="<?php the_field('customer_name') ?>" class="uk-border-circle testimonial-front-meta-image">				
				<span class="testimonial-front-meta-name"><?php the_field('customer_name') ?></span><br>
				<span class="testimonial-front-meta-job-title"><?php the_field('customer_job_title') ?></span>				
			</div><!-- Testimonials Meta Front Finished -->
			<a class="testinmonial-front-more" href="/testimonials/"><?php echo __('See More Testimonials') ?></a> 
		</div><!-- Grid Finished -->
	</div><!-- Container Finished -->			
</div><!-- Testimonials Finished -->

<div class="the-classes the-second-classes">
	<div class="uk-container uk-container-center">
		<div class="uk-grid" data-uk-grid-match="{target:'.uk-panel'}">
			<?php dynamic_sidebar('front-personal'); ?>
		</div><!-- Grid Finished -->
	</div><!-- Container Finished -->
</div><!-- The Classes Finished -->	
<div class="the-blue ready-front">
	<?php dynamic_sidebar('front-ready'); ?>
</div><!-- Ready Front Finished -->		
<?php get_sidebar(); ?>
<?php get_footer(); ?>