(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        $('.lien-event').click(function(){
            var hauteur = $(this).position();
           $(this).parent().parent().find('.event-details').slideDown();
           $(this).parent().parent().find('.event-details').css('top', hauteur.top + 50);
        });
        
	});
	
})(jQuery, this);
