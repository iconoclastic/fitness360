<footer>
	<div class="the-front-form">
		<div class="uk-container uk-container-center">
			<?php dynamic_sidebar('footer-logo');?>
		</div><!-- Container Finished -->			
	</div><!-- Front Footer Finished -->	
	<div class="<?php if (!is_front_page()) {/*echo "closed js-closed";*/} ?> the-slider-desider"><?php dynamic_sidebar('footer-form'); ?></div> 
	<div class="uk-container uk-container-center footer-social">
		<div class="uk-grid uk-grid-width-medium-1-3"> 
			<?php dynamic_sidebar('footer');?>
		</div><!-- Grid Finished -->
	</div><!-- Container Finished -->	
</footer>	


	</body><!-- Body Finished -->
</html><!-- HTML Finished -->