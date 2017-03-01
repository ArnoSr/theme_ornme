<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
            
    <div class="svg-wrapper" aria-hidden="true">
        <?php echo file_get_contents(get_template_directory_uri().'/img/svg-prod/sprite/svgs.svg'); ?>
    </div>

        <!-- header -->
        <header class="header" role="banner">
                
                <div class="wrapper grid-3">
                    
                    <div class="menu flex-container" role="navigation">
                        <div class="bt-menu">
                            <input type="checkbox" id="checkboxMenu">
                            <label for="checkboxMenu" aria-label="Menu"><span class="icon"></span><span class="text-menu">Fermer</span></label>
                        </div>
                        <a href="#" class="lien-vlog"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-play"></use></svg>Vlog</a>
                        <a href="#"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-hashtag"></use></svg>Tags</a>
                    </div>

                    <div class="logo">
                        <a href="<?php echo home_url(); ?>" aria-label="Or Norme, retour à l'accueil">
                            <?php echo file_get_contents(get_template_directory_uri().'/img/logo-ornorme.svg'); ?>
                        </a>
                    </div>
                    
                    <div class="flex-container">
                        <div>
                            Lire la revue
                        </div>
                        <button>Rechercher</button>
                    </div>

                </div>

        </header>
        <!-- /header -->
			
			
			
