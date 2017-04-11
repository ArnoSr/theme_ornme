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

    if(isset($_POST['date_debut_evt']) && $_POST['date_debut_evt'] != ''){
        $date_debut_evt = $_POST['date_debut_evt'];
        $timestamp_debut = strtotime($_POST['date_debut_evt']);
    }

    if(isset($_POST['heure_debut_evt']) && $_POST['heure_debut_evt'] != ''){
        $heure_debut_evt = $_POST['heure_debut_evt'];
    }

    if(isset($_POST['date_fin_evt']) && $_POST['date_fin_evt'] != ''){
        $date_fin_evt = $_POST['date_fin_evt'];
        $timestamp_fin = strtotime($_POST['date_fin_evt']);
    }

    if(isset($_POST['heure_fin_evt']) && $_POST['heure_fin_evt'] != ''){
        $heure_fin_evt = $_POST['heure_fin_evt'];
    }

    if(isset($_POST['video_evt']) && $_POST['video_evt'] != ''){
        $video_evt = $_POST['video_evt'];
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
        if(isset($date_debut_evt)) update_field('date_de_debut', $date_debut_evt, $id);
        if(isset($heure_debut_evt)) update_field('heure_de_debut', $heure_debut_evt, $id);
        if(isset($date_fin_evt)) update_field('date_de_fin', $date_fin_evt, $id);
        if(isset($heure_fin_evt)) update_field('heure_de_fin', $heure_fin_evt, $id);
        if(isset($video_evt)) update_field('lien_video', $video_evt, $id);
        if(isset($timestamp_debut)) update_field('timestamp_debut', $timestamp_debut, $id);
        if(isset($timestamp_fin)) update_field('timestamp_fin', $timestamp_fin, $id);
        
    if($_FILES){
        
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
        
    $files = $_FILES['file_evt'];
        
    $taille_maxi = 3145728; //3MO
        
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
       
        
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              
                     
       <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_large_array = wp_get_attachment_image_src($thumb_id, 'large1920', true);
            $thumb_url_large = $thumb_url_large_array[0];
            $thumb_url_medium_array = wp_get_attachment_image_src($thumb_id, 'large1400', true);
            $thumb_url_medium = $thumb_url_medium_array[0];
            $thumb_url_small_array = wp_get_attachment_image_src($thumb_id, 'large900', true);
            $thumb_url_small = $thumb_url_small_array[0];
            $thumb_url_tiny_array = wp_get_attachment_image_src($thumb_id, 'large600', true);
            $thumb_url_tiny = $thumb_url_tiny_array[0];
        ?>

		<style type="text/css">

		@media only screen and (min-width: 1500px){
			.contact-page{
				background-image: url('<?php echo $thumb_url_large; ?>');
			}
		}

		@media only screen and (min-width: 800px) and (max-width: 1499px){
			.contact-page{
				background-image: url('<?php echo $thumb_url_medium; ?>');
			}
		}

		@media only screen and (max-width: 799px) and (min-width: 500px){
			.contact-page{
				background-image: url('<?php echo $thumb_url_small; ?>');
			}
		}

		@media only screen and (max-width: 499px){
			.contact-page{
				background-image: url('<?php echo $thumb_url_tiny; ?>');
			}
		}
        
			
	</style>
              
              
               <main role="main" class="contact-page background-fixed-page">
                <!-- section -->
                <section class="wrapper wrapper-half">
                    <div class="content-event-form">
                    <?php the_content(); ?>
                    </div>
                    <div>
                        <h1 class="h3-like title-form"><?php the_title();?></h1>
                        <?php if($form_completed == true): ?>
                        <div class="form-completed"><p>Votre événement a bien été ajouté. Il va être étudié avant d'être publié. Merci !</p></div>
                        <?php endif;?>
                        
                        <form id="add_event" action="" method="post" enctype="multipart/form-data">
                            <div class="wrapper-form">
                                <label for="titre-evt">Titre de l'événement <span>*</span></label>
                                <input type="text" id="titre-evt" name="titre_evt" required>
                                <label for="informations-evt">Informations <span>*</span></label>
                                <textarea name="informations_evt" id="informations-evt" rows="3" required></textarea>
                                <label for="file-evt">Charger une photo (max 3mo) <span>*</span></label>
                                <input type="file" id="file-evt" name="file_evt" accept="image/*" data-max-size="3145728" class="upload-file" required>
                                <label for="file-evt" class="label-input">
                                    <span class="bt-upload">Parcourir...</span>
                                    <span class="file-upload">Aucun fichier sélectionné</span>
                                    <span class="message-upload"></span>
                                </label>
                                <label for="video-evt">Lien vers une vidéo (Youtube, Dailymotion ou Vimeo)</label>
                                <input type="text" id="video-evt" name="video_evt">
                                <label for="ville-evt">Ville <span>*</span></label>
                                <input type="text" id="ville-evt" name="ville_evt" required>
                                <label for="adresse-evt">Adresse <span>*</span></label>
                                <input type="text" id="adresse-evt" name="adresse_evt" required>
                                
                                <label for="date-debut-evt">Date de début <span>*</span></label>
                                <input class="input-date" required type="date" data-value="" name="date_debut_evt" placeholder="<?php echo date('d/m/o');?>"><input class="input-date" required type="time" name="heure_debut_evt" placeholder="<?php echo date('H:i');?>">>
                                
                                <label for="date-fin-evt">Date de fin</label>
                                <input class="input-date" type="date" data-value="" name="date_fin_evt" placeholder="<?php echo date('d/m/o');?>">
                                <input class="input-date" type="time" name="heure_fin_evt" placeholder="<?php echo date('H:i');?>">>
                                
                                <label for="url-evt">Url événement</label>
                                <input type="text" id="url-evt" name="url_evt">
                                <label for="facebook-evt">Url Facebook</label>
                                <input type="text" id="facebook-evt" name="facebook_evt">
                                <label for="twitter-evt">Url Twitter</label>
                                <input type="text" id="twitter-evt" name="twitter_evt">
                                <label for="commentaire-evt">Commentaire</label>
                                <textarea name="commentaire_evt" id="commentaire_evt" rows="3"></textarea>
                                
                                <p class="wrapper-submit">
                                <input type="submit" value="Envoyer"><span class="loader"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-loader"></use></svg></span>
                            </p>
                            
                            </div>

                            
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
                            jQuery('.file-upload').html('<strong style="color:red;">Votre fichier est trop lourd. Poids max 3 MO</strong>');
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
                
                jQuery('input[type="date"]').pickadate({
                    format: 'd/mm/yyyy',
                      monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                      weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                      today: 'aujourd\'hui',
                      clear: 'effacer',
                      formatSubmit: 'dd-mm-yyyy',
                      hiddenName: true
                }); 
                
                jQuery('#add_event').submit(function(){
                   jQuery('.loader').show(); 
                });
                
            });
    </script>
       
        <?php get_footer(); ?>