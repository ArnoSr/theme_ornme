<?php

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');

    
    add_image_size('large300', 300, '', true);
    add_image_size('large600', 600, 400, array('center', 'center'));
    add_image_size('large900', 900, 600, array('center', 'center'));
    add_image_size('large1000', 1200, 800, array('center', 'center'));
    add_image_size('large1400', 1400, '', true);
    add_image_size('large1920', 1920, '', true);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}



/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('waypoints', get_template_directory_uri() . '/js/lib/jquery.waypoints.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('waypoints');
        
        wp_register_script('slick', get_template_directory_uri() . '/js/lib/slick.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('slick');
        
        wp_register_script('scrollreveal', get_template_directory_uri() . '/js/lib/scrollreveal.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('scrollreveal');
        
        wp_register_script('myscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('myscripts'); // Enqueue it!

    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page_template('template-home.php')) {
        
        wp_register_script('granim', get_template_directory_uri() . '/js/lib/granim.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('granim');
        
        wp_register_script('scripts_granim', get_template_directory_uri() . '/js/scripts_granim.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('scripts_granim'); // Enqueue it!
    }
    
     if (is_page_template('template-evenement.php')) {
         
        wp_register_script('picker', get_template_directory_uri() . '/js/lib/picker.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('picker');
         
        wp_register_script('picker_date', get_template_directory_uri() . '/js/lib/picker.date.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('picker_date');
         
        wp_register_script('picker_time', get_template_directory_uri() . '/js/lib/picker.time.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('picker_time');
    }
    
    if (is_single()) {        
        wp_register_script('scripts_single', get_template_directory_uri() . '/js/scripts_single.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('scripts_single'); // Enqueue it!
    }
    
    
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function ornorme_custom_excerpt_length( $length ) {
    return 17;
}

add_filter( 'excerpt_length', 'ornorme_custom_excerpt_length', 999 );

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '...';
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

register_taxonomy_for_object_type('post_tag', 'html5-blank');

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_post_type('vlog', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => 'Vlog',
            'singular_name' => 'Vlog',
            'add_new' => 'Ajouter',
            'add_new_item' => 'Ajouter une vidéo',
            'edit' => 'Modifier',
            'edit_item' => 'Modifier une vidéo',
            'new_item' => 'Nouvelle vidéo',
            'view' => 'Voir la vidéo',
            'all_items' => 'Toutes les vidéos'
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_position' => 5,
        'menu_icon' => 'dashicons-video-alt3',
        'taxonomies' => array(
            'post_tag'
        ) // Add Category and Post Tags support
    ));
    
    register_post_type('evenement', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => 'Événements',
            'singular_name' => 'Événement',
            'add_new' => 'Ajouter',
            'add_new_item' => 'Ajouter un événement',
            'edit' => 'Modifier',
            'edit_item' => 'Modifier un événement',
            'new_item' => 'Nouvel événement',
            'view' => 'Voir l\'événement',
            'all_items' => 'Tous les événements'
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
    ));
    
    register_post_type('revue', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => 'Revues',
            'singular_name' => 'Revue',
            'add_new' => 'Ajouter',
            'add_new_item' => 'Ajouter une revue',
            'edit' => 'Modifier',
            'edit_item' => 'Modifier une revue',
            'new_item' => 'Nouvelle revue',
            'view' => 'Voir la revue',
            'all_items' => 'Toutes les revues'
        ),
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_in_admin_bar' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book-alt',
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

// Temps de lecture

function or_temps_lecture($contenu){    
    $nb_mots = str_word_count($contenu);
    $vitesse_lecture = 200; //mots par minute
    $temps_lecture = $nb_mots / $vitesse_lecture;
    $temps_lecture_arrondi = round($temps_lecture);
    
    print '<span>'.$temps_lecture_arrondi.' min</span>';
}

function or_temps_minute_lecture($contenu){    
    $nb_mots = str_word_count($contenu);
    $vitesse_lecture = 200; //mots par minute
    $temps_lecture = $nb_mots / $vitesse_lecture;
    $temps_lecture_arrondi = round($temps_lecture);
    
    print '<span class="tps_restant">'.$temps_lecture_arrondi.'</span>';
}

//Extra field sur page profil

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['titre_poste'] = 'Nom du poste';

	return $profile_fields;
}

add_filter('user_contactmethods', 'modify_contact_methods');

// Durée de la vidéo quand on poste dans vlog

add_action('save_post', 'or_duree_video');

function or_duree_video($post_ID){
    
   if ( 'vlog' == get_post_type() ):
    
    // get iframe HTML
    $iframe = get_field('video');

    preg_match('/src="(.+?)"/', $iframe, $matches);        
    $id_video = str_replace(array('?feature=oembed', "https://www.youtube.com/embed/", "http://www.youtube.com/embed/"),"", $matches[1]);

    $json_video = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$id_video.'&key=AIzaSyD-ND_D6yCz0skEPZjkFvzNcWklukqwpfw%20&part=snippet,contentDetails,statistics,status');
        
    $json = json_decode($json_video, true);
    $duration = $json['items'][0]['contentDetails']['duration'];
    
    function covtime($youtube_time) {
    preg_match_all('/(\d+)/',$youtube_time,$parts);

    // Put in zeros if we have less than 3 numbers.
    if (count($parts[0]) == 1) {
        array_unshift($parts[0], "0", "0");
    } elseif (count($parts[0]) == 2) {
        array_unshift($parts[0], "0");
    }

    $sec_init = $parts[0][2];
    $seconds = $sec_init%60;
    $seconds_overflow = floor($sec_init/60);

    $min_init = $parts[0][1] + $seconds_overflow;
    $minutes = ($min_init)%60;
    $minutes_overflow = floor(($min_init)/60);

    $hours = $parts[0][0] + $minutes_overflow;
        
    if($hours < 10) $hours = '0'.$hours;
    if($minutes < 10) $minutes = '0'.$minutes;
    if($seconds < 10) $seconds = '0'.$seconds;

    if($hours != 0)
        return $hours.':'.$minutes.':'.$seconds;
    else
        return $minutes.':'.$seconds;
}
    
    
    $duration = covtime($duration);

    update_field('duree_video', $duration, $post_ID);
    
    endif;
   
}

//Ajouter vlog dans les archives tags

function namespace_add_custom_types( $query ) {
  if(is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'vlog'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


//

?>