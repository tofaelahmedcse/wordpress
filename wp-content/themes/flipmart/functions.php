<?php
/**
 * flipmart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flipmart
 */

if ( ! function_exists( 'flipmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flipmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flipmart, use a find and replace
		 * to change 'flipmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flipmart', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
        if(function_exists('register_nav_menus')){
            register_nav_menus( array(
                'top-menu' => esc_html__( 'Top Menu', 'flipmart' ),
                'main-menu' => esc_html__( 'Primary', 'flipmart' ),
                'sidebar-menu' => esc_html__( 'Sidebar Menu', 'flipmart' ),
                'footer-menu-one' => esc_html__( 'Footer Menu One', 'flipmart' ),
                'footer-menu-two' => esc_html__( 'Footer Menu Two', 'flipmart' ),
                'footer-menu-three' => esc_html__( 'Footer Menu Three', 'flipmart' ),
            ) );
        }

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'flipmart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

/* --------------slider Customs Post Register----------------- */

if(function_exists('register_post_type')) {
		register_post_type('slider', array(
			'labels' => array(
				'name' => __('Slider', 'flipmart'),
				'menu_name' => __('Slider', 'flipmart'),
				'add_new' => __('Add New Slider', 'flipmart'),
				'add_new_item' => __('Add New Slider', 'flipmart'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'supports' => array('title','editor','thumbnail', 'excerpt')
		   ));
	    }

/* --------------brands Customs Post Register----------------- */

if(function_exists('register_post_type')) {
		register_post_type('brand', array(
			'labels' => array(
				'name' => __('Brand', 'flipmart'),
				'menu_name' => __('Brand', 'flipmart'),
				'add_new' => __('Add New Brand', 'flipmart'),
				'add_new_item' => __('Add New Brand', 'flipmart'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-editor-bold',
			'supports' => array('title')
		   ));
	    }

function wpartisan_excerpt_label( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
        return __( 'Subtitle' );
    } elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
        return __( '' );
    }
    return $translation;
}
add_filter( 'gettext', 'wpartisan_excerpt_label', 10, 2 );

endif;
add_action( 'after_setup_theme', 'flipmart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flipmart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'flipmart_content_width', 640 );
}
add_action( 'after_setup_theme', 'flipmart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flipmart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar Bottom', 'flipmart' ),
		'id'            => 'left-sidebar-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'flipmart' ),
		'before_widget' => '<div class="sidebar-widget wow fadeInUp outer-top-vs">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'flipmart' ),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'flipmart' ),
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="module-heading"><h4 class="module-title">',
		'after_title'   => '</h4></div><div class="module-body">',
	) );
}
add_action( 'widgets_init', 'flipmart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function flipmart_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), '1.0');
	wp_enqueue_style( 'main-css', get_template_directory_uri(). '/assets/css/main.css', array(), '1.0' );
	wp_enqueue_style( 'blue-css', get_template_directory_uri(). '/assets/css/blue.css', array(), '1.0' );
	wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri(). '/assets/css/owl.carousel.css', array(), '1.0' );
	wp_enqueue_style( 'owltransitions-css', get_template_directory_uri(). '/assets/css/owl.transitions.css', array(), '1.0' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri(). '/assets/css/animate.min.css', array(), '1.0' );
	wp_enqueue_style( 'rateit-css', get_template_directory_uri(). '/assets/css/rateit.css', array(), '1.0' );
	wp_enqueue_style( 'bootstrap-select-css', get_template_directory_uri(). '/assets/css/bootstrap-select.min.css', array(), '1.0' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri(). '/assets/css/font-awesome.css', array(), '1.0' );
	wp_enqueue_style( 'flipmart-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
    wp_enqueue_script( 'bootstrap-hover-dropdown-js', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array(), '20151215', true );
    wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '20151215', true );
    wp_enqueue_script( 'echomin-js', get_template_directory_uri() . '/assets/js/echo.min.js', array(), '20151215', true );
    wp_enqueue_script( 'jqueryeasing-js', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array(), '20151215', true );
    wp_enqueue_script( 'bootstrap-slider-js', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array(), '20151215', true );
    wp_enqueue_script( 'jqueryrateit-js', get_template_directory_uri() . '/assets/js/jquery.rateit.min.js', array(), '20151215', true );
    wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/assets/js/lightbox.min.js', array(), '20151215', true );
    wp_enqueue_script( 'bootstrap-select-js', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array(), '20151215', true );
    wp_enqueue_script( 'wowmin-js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );
    wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array(), '20151215', true );
    
     wp_enqueue_script( 'product-search-js', get_template_directory_uri() . '/assets/js/product-search.js', array(), '1.0.0', true);
    wp_localize_script('product-search', 'ajax_url', admin_url('admin-ajax.php'));
   	wp_enqueue_script( 'flipmart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flipmart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flipmart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Woocommerce theme supported */

function flipmart_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'flipmart_add_woocommerce_support' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}




/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'flipmart_woocommerce_breadcrumbs' );
function flipmart_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="breadcrumb-inner"><ul class="list-inline list-unstyled">',
            'wrap_after'  => '</ul></div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}




function flipmart_pagination() {

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'prev_next'          => true,
        'prev_text'          => __( '<i class="fa fa-angle-left "></i>' ),
        'next_text'          => __( '<i class="fa fa-angle-right"></i>' ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '		<div class="pagination-container"><ul class="list-inline list-unstyled">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
}



/**
 * add Remove woocommerce default function
 */
add_action( 'init', 'flipmart_add_Remove_woocommerce_default_function' );
function flipmart_add_Remove_woocommerce_default_function() {
    //shop page
     remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
     remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
     remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
     remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
    
    // single page
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    
}

// woocommerce product show per page dropdown

function flipmart_woocommerce_catalog_page_ordering() {
?>
<div class="lbl-cnt">
    <?php echo '<span class="lbl">Show</span>'; ?>
    <form action="" method="POST" name="results" class="fld inline">
        <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby dropdown dropdown-small dropdown-med dropdown-white inline" onchange="this.form.submit()">
            <?php
 
//Get products on page reload
if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
          } else {
        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
          }
 
//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
			$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
			//Add as many of these as you like, -1 shows all products per page
			  //  ''       => __('Results per page', 'woocommerce'),
				'10' 		=> __('10', 'flipmart'),
				'20' 		=> __('20', 'flipmart'),
				'30' 		=> __('30', 'flipmart'),
				'40' 		=> __('40', 'flipmart'),
				'50' 		=> __('50', 'flipmart'),
				'-1' 		=> __('All', 'flipmart'),
			));

		foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
			echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
        </select>
    </form>
</div>
<?php
}

// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}
 
add_filter('loop_shop_per_page','dl_sort_by_page');

/**
 * woocommerce custom ordering option
 */

add_filter( 'woocommerce_catalog_orderby', 'flipmart_custom_woocommerce_catalog_orderby' );
function flipmart_custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = 'position';
	$sortby['price'] = 'Price:Lowest first';
	$sortby['price-desc'] = 'Price:HIghest first';
	unset($sortby['popularity']);
	unset($sortby['rating']);
	unset($sortby['date']);
	return $sortby;
}

/**
 * Remove the product view grid/list plugin option
 */

function flipmart_woocommerce_product_view_listgrid(){
   global $WC_List_Grid;
   remove_action( 'woocommerce_before_shop_loop', array( $WC_List_Grid, 'gridlist_toggle_button' ), 30); 
}
add_action('woocommerce_archive_description','flipmart_woocommerce_product_view_listgrid');



/**
 * add to cart mini option
 */

 add_filter( 'woocommerce_add_to_cart_fragments', 'flipmart_woocommerce_header_add_to_cart_fragment' );

function flipmart_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'flipmart'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'flipmart'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


require_once('lib/ReduxCore/framework.php');
require_once('lib/sample/config.php');


// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'GET',
        data: { action: 'data_fetch', s: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
    });

}
    

</script>

<?php
}
// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_GET['s'] ), 'post_type' => 'product' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); global $product; ?>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="item item-carousel">
                    <div class="products">

                    <div class="product">		
                    <div class="product-image">
                        <div class="image">
                            <a href="<?php the_permalink(); ?>"><img  src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                        </div><!-- /.image -->			

                        	<?php if ( $product->is_on_sale() ) : ?>
                 <div class="tag new"><span><?php woocommerce_show_product_sale_flash( $post, $product ); ?></span></div>
				 <?php endif; ?>                      		   
                    </div><!-- /.product-image -->


                    <div class="product-info text-left">
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">	
                            <span class="price"><?php echo $product->get_price_html(); ?></span>
                          <!--  <span class="price-before-discount">$ 800</span>-->

                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->
      
                        </div><!-- /.product -->

                    </div><!-- /.products -->
                </div><!-- /.item -->
            </div><!-- /.col -->

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}