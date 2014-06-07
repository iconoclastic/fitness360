<!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title('-', 'true', 'right'); bloginfo('name') ?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/uikit.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/addons/uikit.addons.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
		<?php wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>	
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/uikit.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>		
	</head>
	<body class="<?php 	global $post; $slug = get_post( $post )->post_name; echo $slug; ?>"> 
	<div class="uk-container uk-container-center">		
		<header class="uk-grid" data-uk-grid-match data-uk-grid-margin>
			<a href="<?php echo get_option('home') ?>" class="logo uk-width-small-1-2"><?php dynamic_sidebar('the-logo');?></a>
			<?php dynamic_sidebar('top-menu');?>
		</header>
	</div><!-- Container Finished -->	
	<div class="uk-grid" data-uk-grid-match data-uk-grid-margin>
		<nav class="uk-width-small-1-1 uk-navbar">
			<?php   
				$args = array(
					'theme_location' => '',
					'menu' => '',
					'container' => 'ul',
					'container_class' => 'uk-navbar-nav menu-{menu-slug}-container',
					'container_id' => '',
					'menu_class' => 'uk-navbar-nav uk-container uk-container-center',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth' => 0,
					'walker' => new Child_Wrap()
				);
			
				wp_nav_menu( $args ); ?>
		</nav>
	</div><!-- Grid Finished -->