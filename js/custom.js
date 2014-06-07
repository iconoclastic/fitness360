jQuery.noConflict();
jQuery(document).ready(function($) {

	var speeed = 600;

	//Touch/No-touch menu changing behavior Initial state

	var theParents = $('#menu-primary-navigation li.uk-parent');

	if ($(window).width() < 768) {
		theParents.attr("data-uk-dropdown", "{mode:'click'}");
	} else {
		theParents.attr('data-uk-dropdown', '');		
	}

	//Touch/No-touch menu changing behavior window resize state

	$(window).resize(function(){
		if ($(window).width() < 768) {
			theParents.attr("data-uk-dropdown", "{mode:'click'}");
		} else {
			theParents.attr('data-uk-dropdown', '');
		}	
	});	

	//Making first occurance of classes widgets take up double width

	$('.the-classes .uk-width-medium-1-4:first-child').removeClass('uk-width-medium-1-4').addClass('uk-width-medium-2-4');

	//Expanding the link for class widgets to whole panel and Adding orange icon to them

	$('.the-classes .uk-width-medium-1-4 .uk-panel .simple-image > a').each(function(){
		var theLinkHref = $(this).attr('href');
		$(this).closest('.simple-image').before('<i class="uk-icon-chevron-circle-right"></i>');
		$(this).closest('.uk-panel').wrapAll('<a href="' + theLinkHref + '" />');
	});

	//Footer form slider

	$('.slide-up-down-controller').click(function() {
		var theDesider = $('.the-slider-desider');
		if (theDesider.hasClass('js-closed')) {
			$(this).closest('.uk-container').find('.slide-up-down').stop(true, true).slideDown(speeed);
			theDesider.removeClass('closed').removeClass('js-closed');
			$('html, body').animate({
		        scrollTop: $('.textwidget .the-front-form .uk-container').offset().top
		    }, speeed);
		} else {
			$(this).closest('.uk-container').find('.slide-up-down').stop(true, true).slideUp(speeed);
			theDesider.addClass('js-closed');
		}
	});

	//ToTop click event handler

	$('.to-top').click(function(){
		$('html, body').animate({
	        scrollTop: $('.the-front-content').offset().top
	    }, speeed);		
	});

	//Content h1 centering fix
	$('.the-content h1').wrapAll('<div style="text-align: center; width: 100%;" />'); 

	//See More Activation

	$('.the-archive .the-more').click(function(){
		var theClosest = $(this).closest('.margin-fix');		
		if($(this).text() == "See More") {
			$(this).addClass('the-less').text("See Less");
			theClosest.find('.after-more').stop(true, true).slideDown(speeed);
		} else {
			$(this).removeClass('the-less').text("See More");
			theClosest.find('.after-more').stop(true, true).slideUp(speeed);
		}
	});

});	