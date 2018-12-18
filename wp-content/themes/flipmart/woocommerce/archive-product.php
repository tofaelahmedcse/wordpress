<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>

<div class="breadcrumb">
	<div class="container">
        <?php woocommerce_breadcrumb(); ?>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
            <?php 
                /** * Hook: woocommerce_sidebar. * * @hooked woocommerce_get_sidebar - 10 */ 
                do_action( 'woocommerce_sidebar' );
            ?>
            <div class='col-md-9'>
                <div class="clearfix filters-container m-t-10">
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', false ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' ); ?>
    
    <div class="row">
        <div class="col-md-3">
            <div class="filter-tabs">
                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li class="active">
                            <a href="#" id="grid" title="Grid view"><i class="icon fa fa-th-large"></i>Grid</a>
                        </li>
                        <li><a href="#" id="list" title="List view"><i class="icon fa fa-th-list"></i>List</a></li>
                    </ul>
            </div>
        </div>
        <div class="col-md-3">
            
            <div class="lbl-cnt">
					<span class="lbl">Sort by</span>
					<div class="fld inline">
						 <?php woocommerce_catalog_ordering(); ?>
					</div><!-- /.fld -->
            </div>
        </div>
        <div class="col-md-3">
            <?php flipmart_woocommerce_catalog_page_ordering(); ?>
        </div>
        <div class="col-md-3">
            <?php flipmart_pagination(); ?>
        </div>
    </div>
<?php 
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
    
     flipmart_pagination(); 
    
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' ); ?>

        </div>
        </div>
     </div>
         <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <?php 
                    $brands = new WP_Query(array(
                        'post_type' => 'brand',
                        'posts_per_page' => -1,
                        'order' => 'DESC'
                    ));
                while($brands->have_posts()) : $brands->the_post();
                ?>
                    <div class="item m-t-15">
                        <a href="<?php the_field('brand_link');?>" class="image">
                            <img src="<?php  the_field('brand_image');?>" alt="">
                        </a>	
                    </div><!--/.item-->
                <?php endwhile; ?>

		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
</div>
<?php get_footer( 'shop' ); ?>
