(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        //Granim       


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

        