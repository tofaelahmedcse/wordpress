<?php 
/*
Template Name: Home
*/
get_header();
?>

<?php 
    if($_GET['s'] && !empty($_GET['s']))
    {
        $text = $_GET['s'];
    }

    if($_GET['type'] && !empty($_GET['type']))
    {
        $type = $_GET['type'];
    }

?>

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->	
		<?php get_template_part('left-sidebar');?>
		<!-- ============================================== SIDEBAR : END ============================================== -->

		<!-- ============================================== CONTENT ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
       
        <h4>Searching for: <?php echo $text; ?></h4>

          <?php
            if(have_posts()) {
                $args = array(
                    'post_type' => $type,
                    'posts_per_page' => -1,
                    's' => $text,
                    /*'exact' => true,
                    'sentence' => true*/
                );
                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post(); 
                
            ?>
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

	       <?php endwhile; wp_reset_query(); ?>
	       <?php } else { ?>
	               <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
	       <?php } ?>

		</div><!-- /.homebanner-holder -->
		<!-- ============================================== CONTENT : END ============================================== -->
	</div><!-- /.row -->
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
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->



<?php get_footer(); ?>