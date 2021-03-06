<?php
/**
 * Author Name: Jan T. Jensen
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
 $caruosel = [
        'image1'=>get_template_directory_uri() . '/assets/images/photo-1536104968055-4d61aa56f46a.jpg',
        'image2'=>get_template_directory_uri() . '/assets/images/photo-1520085601670-ee14aa5fa3e8.jpg',
        'image3'=>get_template_directory_uri() . '/assets/images/photo-1502951682449-e5b93545d46e.jpg',
        'image4'=>get_template_directory_uri() . '/assets/images/photo-1604145559206-e3bce0040e2d.jpg',
        'image5'=>get_template_directory_uri() . '/assets/images/photo-1603969280040-3bbb77278211.jpg'
    ];
$GLOBALS['OPGAVE_CARUOSEL']=$caruosel;


include_once get_template_directory(  ) . '/inc/customizer.php';

function setup_opgave_theme(){

    if (is_admin()){
        	
        add_theme_support(
			'custom-logo',
			array(
				'height'               => 100,
				'width'                => 300,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

        add_theme_support( 'wp-block-styles' );
        add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
      add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

        add_theme_support( 'title-tag' );

        add_theme_support( 'automatic-feed-links' );

        register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'Opgave' ),
				'footer'  => __( 'Secondary menu', 'Opgave' ),
			)
		);
        add_theme_support( 'customize-selective-refresh-widgets' );
       
    
    }
}
add_action( 'after_setup_theme', 'setup_opgave_theme' );
/*Load Stylesheet*/
function load_css()
{
    wp_enqueue_style( 'icon', 'https://fonts.googleapis.com/icon?family=Material+Icons', 'all');
    wp_register_style('opgave', get_template_directory_uri() . '/assets/css/opgave.css', array(), 1, 'all');
    wp_enqueue_style('opgave');
}
add_action('wp_enqueue_scripts', 'load_css');

/*Load javascript*/
function load_javascript()
{
    wp_register_script('opgave', get_template_directory_uri() . '/assets/js/opgave.js', array(), 1, true);
    wp_enqueue_script('opgave');
}
add_action('wp_enqueue_scripts', 'load_javascript');


function opgave_setup_custom_header() {
    $args = array(
        'default-image'      => get_template_directory_uri() . '/assets/images/photo-1511376777868-611b54f68947.jpg',
        'default-text-color' => '000',
        'width'              => 1500,
        'height'             => 1000,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
 add_action('after_setup_theme', 'opgave_setup_custom_header');

function opgave_add_new_page_set_as_frontpage(){
    $new_page_title = 'B??rnholdt frontend opgave 1.0';
    $new_page_content = '<p>M??let for denne opgave er at ops??tte ??n responsiv side med l??bende udfordringer, hvor sidens omfang vil best?? af HTML, CSS og JavaScript. Vi vil derefter kigge p?? hvordan du har valgt at prioriterer din tid, hvor pixel perfect den er, hvordan din kode performance har v??ret og helt til sidst hvordan du har l??st responsiviteten.</p>
        <h3>Herunder beskrives selve opgaven:</h3>
        <ol>
        <li>Ops??t sidens struktur i HTML og CSS</li>
        <li>G??r billede 2 og 3 parallax. Billede 2 holder sin position, hvor billede 3 bev??ger sig henover billede 2.</li>
        <li>Tilf??j JavaScript og g??r karusellen i bunden interaktiv.</li>
        <li>G??r siden responsiv.</li>
        </ol>';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => sanitize_title($new_page_title)
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
    
        update_option( 'page_on_front', $new_page_id );
        update_option( 'show_on_front', 'page' );
    }
}
 add_action('after_setup_theme','opgave_add_new_page_set_as_frontpage');


function opgave_add_new_post_to_new_catgory(){
     $term_id = 0;
    if(!term_exists('Opgave')) {
    $Opgave_id = wp_insert_term(
        'Opgave',
        'category',
        array(
          'description' => 'sample category.',
          'slug'        => 'opgave'
        )
        );
        if( ! is_wp_error($Opgave_id) ){
	        $term_id = $Opgave_id['term_id'];
        }
 
    }
  
    if($term_id==0) return;    
    $new_post_title = 'Referencer som er brugt i designet';
    $new_post_content = '<p>https://images.unsplash.com/photo-1511376777868-611b54f68947?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1500&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1579403124614-197f69d8187b?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1542546068979-b6affb46ea8f?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=668&amp;q=80</p>
    <p>https://material.io/resources/icons/?style=baseline</p>
    <h3>Billeder i galleriet</h3>
    <p>https://images.unsplash.com/photo-1536104968055-4d61aa56f46a?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2900&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1520085601670-ee14aa5fa3e8?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1500&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1502951682449-e5b93545d46e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1332&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1604145559206-e3bce0040e2d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1000&amp;q=80</p>
    <p>https://images.unsplash.com/photo-1603969280040-3bbb77278211?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=668&amp;q=80</p>';
    $post_check = get_page_by_title($new_post_title);
    $new_post = array(
        'post_type' => 'post',
        'post_title' => $new_post_title,
        'post_content' => $new_post_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => sanitize_title($new_post_title),
        'post_category'=>array($term_id)
    );
    if(!isset($post_check->ID)){
        $new_post_id = wp_insert_post($new_post);
    }
}

 add_action('after_setup_theme','opgave_add_new_post_to_new_catgory');












