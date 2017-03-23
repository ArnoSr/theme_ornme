(function ($, root, undefined) {
	
	$(function () {
		
        'use strict';
        
        jQuery('body').on('submit', '#add_event', function(e){
            e.preventDefault();
            
            // Je récupère les valeurs
            var titre_evt = $(this).find('input[name="titre-evt"]').val();
            var informations_evt = $(this).find('textarea[name="informations-evt"]').val();
            var ville_evt = $(this).find('input[name="ville-evt"]').val();
            var adresse_evt = $(this).find('input[name="adresse-evt"]').val();
            var url_evt = $(this).find('input[name="url-evt"]').val();
            var facebook_evt = $(this).find('input[name="facebook-evt"]').val();
            var twitter_evt = $(this).find('input[name="twitter-evt"]').val();
            var commentaire_evt = $(this).find('textarea[name="commentaire-evt"]').val();
            var file_evt = $(this).find('input[name="file-evt"]').val();
            
            console.log(file_evt);
            

            jQuery.post(
                ajaxurl,
                {
                    'action': 'ajax_addEvent',
                    'informations_evt' : informations_evt,
                    'titre_evt' : titre_evt,
                    'ville_evt' : ville_evt,
                    'adresse_evt' : adresse_evt,
                    'url_evt' : url_evt,
                    'facebook_evt' : facebook_evt,
                    'twitter_evt' : twitter_evt,
                    'commentaire_evt' : commentaire_evt,
                    'file_evt' : file_evt,
                },            

                function(cheque){
                    
                    if(cheque.reponse === 'ok'){
                    }
                    
                }, "json"
            );
        });
  
    
   //End function jquery
	});
	
})(jQuery, this);