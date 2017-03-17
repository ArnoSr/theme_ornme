(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        $('.menu-cat-wrapper li:first-child').addClass('actif');
        $('.cat-menu:first-child').show();
		
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
        
        
        //VLOG
        
        $('.vlog-slider-3').slick({
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 3,
            nextArrow: '<button type="button" class="slick-next"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
            prevArrow: '<button type="button" class="slick-prev"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
        });
        
        $('.vlog-slider-4').slick({
          infinite: false,
          slidesToShow: 4,
          slidesToScroll: 4,
            nextArrow: '<button type="button" class="slick-next"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
            prevArrow: '<button type="button" class="slick-prev"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
        });
        
        //Ajouter class video au parent des videos embed
        
        $('.page-template-default').find('iframe').parent().addClass('video');
        
        


	});
	
})(jQuery, this);
