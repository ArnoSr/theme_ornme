(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
        $('.menu-cat-wrapper li').mouseover(function(){
            var $cat = $(this).attr('data-menu');
            $('.menu-cat-wrapper li').removeClass('actif');
            $(this).addClass('actif');
            $('.cat-menu').hide();
            $('.cat-menu.cat-'+$cat).show();
        });
		
	});
	
})(jQuery, this);
