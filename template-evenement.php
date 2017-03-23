<?php

$validation_form = false;
$form_completed = false;
    
    if(isset($_POST['titre_evt']) && $_POST['titre_evt'] != ''){
        $titre_evt = $_POST['titre_evt'];
        $validation_form = true;
    }else{
        $validation_form = false;
    }
    
    if(isset($_POST['informations_evt']) && $_POST['informations_evt'] != ''){
        $informations_evt = $_POST['informations_evt'];
    }
    
    if(isset($_POST['ville_evt']) && $_POST['ville_evt'] != ''){
        $ville_evt = $_POST['ville_evt'];
    }
    
    if(isset($_POST['adresse_evt']) && $_POST['adresse_evt'] != ''){
        $adresse_evt = $_POST['adresse_evt'];
    }
    
    if(isset($_POST['url_evt']) && $_POST['url_evt'] != ''){
        $url_evt = $_POST['url_evt'];
    }
    
    if(isset($_POST['facebook_evt']) && $_POST['facebook_evt'] != ''){
        $facebook_evt = $_POST['facebook_evt'];
    }
    
    if(isset($_POST['twitter_evt']) && $_POST['twitter_evt'] != ''){
        $twitter_evt = $_POST['twitter_evt'];
    }
    
    if(isset($_POST['commentaire_evt']) && $_POST['commentaire_evt'] != ''){
        $commentaire_evt = $_POST['commentaire_evt'];
    }
    
    if($validation_form == true){
        
        $postArgs = array(
            'post_title' => $titre_evt,
            'post_type' => 'evenement',
            'post_status' => 'pending',
        ); 

        $id = wp_insert_post($postArgs);  
        
        if(isset($informations_evt)) update_field('informations', $informations_evt, $id);
        if(isset($ville_evt)) update_field('ville', $ville_evt, $id);
        if(isset($adresse_evt)) update_field('adresse', $adresse_evt, $id);
        if(isset($url_evt)) update_field('url_evenement', $url_evt, $id);
        if(isset($facebook_evt)) update_field('url_facebook', $facebook_evt, $id);
        if(isset($twitter_evt)) update_field('url_twitter', $twitter_evt, $id);
        if(isset($commentaire_evt)) update_field('commentaire', $commentaire_evt, $id);
        //if(isset($file_evt)) update_field('photo_ou_video', $file_evt, $id);
        
    if($_FILES){
        
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
        
    $files = $_FILES['file_evt'];
        
    $taille_maxi = 3500000; //3MO
        
    //$taille = filesize($_FILES['avatar']['tmp_name']);

        
        if ($files['name']) {
            
            $error = '';

            $file = array(
                'name'     => $files['name'],
                'type'     => $files['type'],
                'tmp_name' => $files['tmp_name'],
                'error'    => $files['error'],
                'size'     => $files['size']
            );
            
            if($file['size'] > $taille_maxi){
                $error = "Votre fichier est trop lourd.";
            }else{
                $sizeOk = true;
            }
            
            if($file['type'] == "image/jpeg" or $file['type'] == "image/jpg" or $file['type'] == "image/png" or $file['type'] == "video/mp4" or $file['type'] == "video/avi" or $file['type'] == "image/mpeg"){
                $formatOk = true;
            }else{
                $error = "Notre formulaire n'accepte pas ce type de fichier.";
            }
            
            if(isset($sizeOk) && isset($formatOk)){
                    $upload_overrides = array( 'test_form' => false );
                    $upload = wp_handle_upload($file, $upload_overrides);

                    // $filename should be the path to a file in the upload directory.
                    $filename = $upload['file'];

                    // The ID of the post this attachment is for.
                    $parent_post_id = $id;

                    // Check the type of tile. We'll use this as the 'post_mime_type'.
                    $filetype = wp_check_filetype( basename( $filename ), null );

                    // Get the path to the upload directory.
                    $wp_upload_dir = wp_upload_dir();

                    // Prepare an array of post data for the attachment.
                    $attachment = array(
                        'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                        'post_mime_type' => $filetype['type'],
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );

                    // Insert the attachment.
                    $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );

                    // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );

                    // Generate the metadata for the attachment, and update the database record.
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                
                    update_field('photo_ou_video', $attach_id, $id);
                
                    $form_completed = true;
                
                    
            }else{
                die($error);
            }
        }
    }
        
    }

?>
    <?php /* Template Name: Événement */ get_header(); ?>
        <main role="main" class="contact-page">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- section -->
                <section class="wrapper wrapper-half">
                    <div>
                        <?php the_content(); ?>
                    </div>
                    <div>
                        <h1 class="h4-like"><?php the_title();?></h1>
                        <?php if($form_completed == true): ?>
                        <div class="form-completed"><p>Votre événement a bien été ajouté. Il va être étudié avant d'être publié. Merci !</p></div>
                        <?php endif;?>
                        
                        <form id="add_event" action="" method="post" enctype="multipart/form-data">
                            <div class="wrapper-form">
                                <label for="titre-evt">Titre de l'événement</label>
                                <input type="text" id="titre-evt" name="titre_evt" required>
                                <label for="categorie-evt">Catégorie de l'événement</label>
                                <input type="text" id="categorie-evt" name="categorie_evt">
                                <label for="informations-evt">Informations</label>
                                <textarea name="informations_evt" id="informations-evt" rows="3"></textarea>
                                <label for="file-evt">Charger une photo ou une vidéo (max 2mo)</label>
                                <input type="file" id="file-evt" name="file_evt" accept="video/*,image/*" data-max-size="3000000" class="upload-file">
                                <label for="file-evt" class="label-input">
                                    <span class="bt-upload">Parcourir...</span>
                                    <span class="file-upload">Aucun fichier sélectionné</span>
                                    <span class="message-upload"></span>
                                </label>
                                <label for="ville-evt">Ville</label>
                                <input type="text" id="ville-evt" name="ville_evt">
                                <label for="adresse-evt">Adresse</label>
                                <input type="text" id="adresse-evt" name="adresse_evt">
                                <label for="url-evt">Url événement</label>
                                <input type="text" id="url-evt" name="url_evt">
                                <label for="facebook-evt">Url Facebook</label>
                                <input type="text" id="facebook-evt" name="facebook_evt">
                                <label for="twitter-evt">Url Twitter</label>
                                <input type="text" id="twitter-evt" name="twitter_evt">
                                <label for="commentaire-evt">Commentaire</label>
                                <textarea name="commentaire-evt" id="commentaire_evt" rows="3"></textarea>
                            </div>
                            <p>
                                <input type="submit" value="Envoyer">
                            </p>
                            
                        </form>
                    </div>
                    <?php endwhile; ?>
                </section>
                <!-- /section -->
                <?php endif; ?>
        </main>
        
         <script>
            jQuery(function(){
                
                jQuery('#file-evt').change(function(){
                    var fileInput = jQuery('.upload-file');
                    var maxSize = fileInput.data('max-size');
                    
                    name_file = jQuery(this).val();
                    
                    if(fileInput.get(0).files.length){
                        var fileSize = fileInput.get(0).files[0].size; // in bytes
                        if(fileSize>maxSize){
                            jQuery('.file-upload').html('Votre fichier est trop lourd.');
                        }else{
                            jQuery('.file-upload').html(name_file);
                            jQuery('.response-output').hide();
                        }
                    }
                })
                
            var fileInput = jQuery('.upload-file');
                var maxSize = fileInput.data('max-size');
                jQuery('form').submit(function(e){
                    if(fileInput.get(0).files.length){
                        var fileSize = fileInput.get(0).files[0].size; // in bytes
                        if(fileSize>maxSize){
                            jQuery(this).append('<p class="response-output not-valid">Votre fichier est trop lourd.</p>');
                            return false;
                        }else{
                            //Ok
                        }
                    }else{
                        //
                    }

                });
                
                
            });
    </script>
       
        <?php get_footer(); ?>