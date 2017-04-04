(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        $('.lien-event').click(function(event){
            event.preventDefault();
            var num_article = $(this).attr('data-slug');
            var prout = $(this).position();
            $('event-details').fadeOut();
            $('body').find("[data-slug='" + num_article + "']").fadeIn().css('top', prout.top - 5);
        });
        
        $('.close').click(function(){
            $(this).parent().fadeOut();
        });
        
	});
	
})(jQuery, this);
