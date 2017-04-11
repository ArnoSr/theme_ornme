(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        $('.article-event').click(function(event){
            event.preventDefault();
            var num_article = $(this).attr('data-slug');
            var la_position = $(this).position();
            var hauteur = $(this).height();
            $('event-details').fadeOut();
            $('body').find("[data-slug='" + num_article + "']").fadeIn().css('top', la_position.top + hauteur);
        });
        
        $('.close').click(function(){
            $(this).parent().fadeOut();
        });
        
	});
	
})(jQuery, this);
