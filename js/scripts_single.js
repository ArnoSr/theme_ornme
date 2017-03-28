(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
        
        // Reste à lire single article
        
        var hauteur_ecran = $(window).height();
        
        var hauteur_page = $(document).height() - $('.cat-vlog').height() - $('.cross-mobile').height() - $('.more-article').height() - $('.links-footer').height() - hauteur_ecran/2;
        
        var position_ecran;        
        var pourcentage_lecture;
        
        var tps_lecture = $('.tps_restant').html();
        
        var tps_restant_lecture;
        
        
        
        $(document).scroll(function(){
            //Barre
            position_ecran = $(document).scrollTop();            
            pourcentage_lecture = position_ecran / hauteur_page * 100 ;
            $('.barre-tps-lecture').css('width', pourcentage_lecture+'%');
            
            
            //Temps restant
            tps_restant_lecture = Math.round(tps_lecture - (tps_lecture * pourcentage_lecture / 100));
            
            if(tps_restant_lecture < 1){
                tps_restant_lecture = "< 1";
            }
            
            $('.tps_restant').html(tps_restant_lecture);
            
        });
        
        
        


	});
	
})(jQuery, this);
