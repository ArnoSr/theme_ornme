(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        //Menu
        
        function verif_menu(){
            if($('#checkboxMenu').is(':checked')){
                $('body').addClass('menu_open');
            }else{
                $('body').removeClass('menu_open');
            }
        }
        
        verif_menu();
        
        $('#checkboxMenu').change(function(){
            verif_menu();
        });
        
        $('.menu-desktop li:first-child').addClass('actif');
        $('.cat-menu:first-child').show();
		
        //Sous-menu
        $('.menu-desktop li').mouseover(function(){
            var $cat = $(this).attr('data-menu');
            $('.menu-cat-wrapper li').removeClass('actif');
            $(this).addClass('actif');
            $('.cat-menu').hide();
            $('.cat-menu.cat-'+$cat).show();
            
            if($('.vlog').hasClass('actif')){
                $('.vlog-menu').show();
            }else{
                $('.vlog-menu').hide();
            }
        });
        
        // Menu responsive
        
        $('.has-submenu > a').click(function(event){
           event.preventDefault();
            $(this).parent().find('ul').fadeToggle();
        });
        
        //Tags
        $('#link_tags').click(function(){
           $('.wrapper-tags').toggleClass('tagOpen');
        });
        
        //Menu
        //Padding sur le main selong hauteur du menu
        $('.main').css('padding-top', $('.menu-top-wrapper').height());
        
        $(window).resize(function(){
            $('.main').css('padding-top', $('.menu-top-wrapper').height());
        });

        
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
            responsive: [
              {
                  breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                  }
              },
              {
                  breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                  }
              }
          ]
        });
        
        $('.vlog-slider-4').slick({
          infinite: false,
          slidesToShow: 4,
          slidesToScroll: 4,
          nextArrow: '<button type="button" class="slick-next"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
          prevArrow: '<button type="button" class="slick-prev"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-arrow"></use></svg></button>',
          responsive: [
              {
                  breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                  }
              },
              {
                  breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                  }
              },
              {
                  breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                  }
              }
          ]
        });
        
        //Ajouter class video au parent des videos embed
        
        $('.page-template-default').find('iframe').parent().addClass('video');
        
        // Recherche
        
        $('.header .search-submit').click(function(e){
            
            if($('.search-input').val() == ''){
                e.preventDefault();
                $(this).parent().find('.search-input').fadeIn().focus();
                $('.lire-revue').hide();
                $('.logo').hide();
            }
 
        });
        
	});
	
})(jQuery, this);
