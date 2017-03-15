(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
        //Sous-menu
        $('.menu-cat-wrapper li').mouseover(function(){
            var $cat = $(this).attr('data-menu');
            $('.menu-cat-wrapper li').removeClass('actif');
            $(this).addClass('actif');
            $('.cat-menu').hide();
            $('.cat-menu.cat-'+$cat).show();
        });
        
        //Tags
        $('#link_tags').click(function(){
           $('.wrapper-tags').toggleClass('tagOpen');
        });
        
        //Menu
        //Padding sur le main selong hauteur du menu
        $('.main').css('padding-top', $('.menu-top-wrapper').height());
        
        //Mini menu
        
        var waypoints = $('.main').waypoint(function(direction) {
          $('.menu-top-wrapper').toggleClass('smaller');
        
        },{ offset: '-500px'
        })
    








	});
	
})(jQuery, this);
