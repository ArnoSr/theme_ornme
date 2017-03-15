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
        
        //Prout
        


    var granimInstance = new Granim({
        element: '#canvas',
        name: 'basic-gradient',
        direction: 'top-bottom',
        opacity: [1, 1],
        stateTransitionSpeed: 1500,
        isPausedWhenNotInView: true,
        states : {
            "default-state": {
                gradients: [
                    ['#f1f2f2', '#f1f2f2'],
                ],
            },
            "or-piste": {
                gradients: [
                    ['#fd8100', '#fa4e00'],
                ]
            },
            "or-cadre": {
                gradients: [
                    ['#ff9068', '#ff4b1f'],
                ]
            },
            "or-doeuvre": {
                gradients: [
                    ['#9bd053', '#45b649'],
                ]
            },
            "or-bord": {
                gradients: [
                    ['#0f59f0', '#0a3ea9'],
                ],
                transitionSpeed: 3000
            },
            "or-sujet": {
                gradients: [
                    ['#dc281e', '#f00000'],
                ]
            },
        }
    });
        
        // With jQuery
        $('#default-state-cta').on('click', function(event) {
            event.preventDefault();
            granimInstance.changeState('default-state');
            setClass('#default-state-cta')
        });
        
        var category = new Array('op-piste','or-cadre','or-doeuvre','or-bord','or-sujet');
    
        var waypoints = $('.cat-gradient.or-cadre').waypoint(function(direction) {
          granimInstance.changeState('or-cadre');
        },{ offset: 'bottom-in-view'
        })
        
        var waypoints = $('.cat-gradient.or-bord').waypoint(function(direction) {
          granimInstance.changeState('or-bord');
        },{ offset: 'bottom-in-view'
        })
                
        var waypoints = $('.cat-gradient.or-doeuvre').waypoint(function(direction) {
          granimInstance.changeState('or-doeuvre');
        },{ offset: 'bottom-in-view'
        })
        
        var waypoints = $('.cat-gradient.or-piste').waypoint(function(direction) {
          granimInstance.changeState('or-piste');
        },{ offset: 'bottom-in-view'
        })
                
        var waypoints = $('.cat-gradient.or-sujet').waypoint(function(direction) {
          granimInstance.changeState('or-sujet');
        },{ offset: 'bottom-in-view'
        })
                
        var waypoints = $('.cat-gradient.or-bord').waypoint(function(direction) {
          granimInstance.changeState('or-bord');
        },{ offset: '100%'
        })
        
        var waypoints = $('.cat-gradient.or-cadre').waypoint(function(direction) {
          granimInstance.changeState('or-cadre');
        },{ offset: '50%'
        })
        
        var waypoints = $('.cat-gradient.or-doeuvre').waypoint(function(direction) {
          granimInstance.changeState('or-doeuvre');
        },{ offset: '50%'
        })
        
        var waypoints = $('.cat-gradient.or-piste').waypoint(function(direction) {
          granimInstance.changeState('or-piste');
        },{ offset: '50%'
        })
        
        var waypoints = $('.cat-gradient.or-sujet').waypoint(function(direction) {
          granimInstance.changeState('or-sujet');
        },{ offset: '50%'
        })



	});
	
})(jQuery, this);
