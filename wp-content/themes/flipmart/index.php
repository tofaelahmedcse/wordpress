<?php 
/*
Template Name: Home
*/
get_header();
global $product;
?>

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->	
		<?php get_template_part('left-sidebar');?>
		<!-- ============================================== SIDEBAR : END ============================================== -->

		<!-- ============================================== CONTENT ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        <?php 
         $sliders = new WP_Query(array(
             'post_type'      => 'slider',
             'posts_per_page' => -1,
             'order'          => 'DESC'
         ));
        while($sliders->have_posts()) : $sliders->the_post(); 
        
        $sliderImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        ?>
		
            <div class="item" style="background-image: url(<?php echo $sliderImg[0]; ?>);">
                <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="slider-header fadeInDown-1"><?php the_title(); ?></div>
                        <div class="big-text fadeInDown-1">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="excerpt fadeInDown-2 hidden-xs">

                        <span><?php the_content(); ?></span>

                        </div>
                        <div class="button-holder fadeInDown-3">
                            <a href="<?php the_permalink(); ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                        </div>
                    </div><!-- /.caption -->
                </div><!-- /.container-fluid -->
            </div><!-- /.item -->

		<?php endwhile; wp_reset_query(); ?>
		

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	

			<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green"><?php global $flipmart; echo $flipmart['money-title'];?></h4>
						</div>
					</div>	
					<h6 class="text"><?php echo $flipmart['money-desc'];?></h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green"><?php echo $flipmart['free-title'];?></h4>
						</div>
					</div>
					<h6 class="text"><?php echo $flipmart['free-desc'];?></h6>	
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green"><?php echo $flipmart['special-title'];?></h4>
						</div>
					</div>
					<h6 class="text"><?php echo $flipmart['special-desc'];?></h6>	
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->
			<!-- ============================================== SCROLL TABS ============================================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">New Products</h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <?php 
                $terms = get_terms( 'product_cat', array(
                                    'hide_empty' => false,
                                    'orderby' => 'name',
                                    'include' => array( 31, 20, 35, 29 ),
                                    
                                ) );
                    $counter = 0;
                   if(!empty($terms)) {
                       foreach($terms as $term){
                        $counter++;
            ?>
			     <li class="<?php if($counter == 1){ echo 'active';}?>"><a data-transition-type="backSlide" href="#<?php echo $term->slug; ?>" data-toggle="tab"><?php echo $term->name; ?></a></li>
            
            <?php }} ?>
		</ul><!-- /.nav-tabs -->
	</div>

	<div class="tab-content outer-top-xs">
       
        <?php
            if(!empty($terms)) {
                $counter = 0;
                foreach($terms as $term) {
                    $counter++;
        ?>
		<div class="tab-pane <?php if($counter == 1){echo 'in active'; }?>" id="<?php echo $term->slug; ?>">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    
            <?php 
                $tabsitem = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'order' => 'DESC',
                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug,
                                        'include_children'  => false

                                        ),
                                    ),
                    ));
                while($tabsitem->have_posts()) : $tabsitem->the_post(); 

            ?>	
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
                    
	       <?php endwhile; wp_reset_query(); ?>
		
		</div><!-- /.home-owl-carousel -->
            </div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

		<?php }} ?>

	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">
<div class="col-md-7 col-sm-7">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="<?php echo $flipmart['left-image']['url'];?>" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
<div class="col-md-5 col-sm-5">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="<?php echo $flipmart['right-image']['url'];?>" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.wide-banners -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Featured products</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    <?php 
                $featureitem = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                     'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                            ),
                        ),
                  ));
                while($featureitem->have_posts()) : $featureitem->the_post(); 
            ?>	 	
            <div class="item item-carousel">
            <div class="products">

            <div class="product">		
            <div class="product-image">
                <div class="image">
                    <a href="<?php the_permalink(); ?>"><img  src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                </div><!-- /.image -->			
                <?php if ( $product->is_on_sale() ) : ?>
                    <div class="tag hot"><span><?php woocommerce_show_product_sale_flash( $post, $product ); ?></span></div>	
                <?php endif; ?>
            </div><!-- /.product-image -->


            <div class="product-info text-left">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>

                <div class="product-price">	
                    <span class="price"><?php echo $product->get_price_html(); ?></span>

                </div><!-- /.product-price -->

            </div><!-- /.product-info -->
                        
                </div><!-- /.product -->

                </div><!-- /.products -->
                </div><!-- /.item -->
	       <?php endwhile; wp_reset_query(); ?>		
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">

		<div class="col-md-12">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" src="<?php echo $flipmart['wide-add-image']['url'];?>" alt="">
				</div>	
				<div class="strip strip-text">
					<div class="strip-inner">
						<h2 class="text-right"><?php echo $flipmart['wide-add-title'];?><br>
						<span class="shopping-needs"><?php echo $flipmart['wide-add-offer-text'];?></span></h2>
					</div>	
				</div>
				<div class="new-label">
				    <div class="text"><?php echo $flipmart['wide-add-label-text'];?></div>
				</div><!-- /.new-label -->
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.wide-banners -->
<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== BEST SELLER ============================================== -->

<div class="best-deal wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">Best seller</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                <div class="item">
                <div class="products best-product">
            <?php 
            $bestseller = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'order' => 'DESC',
                    'meta_key' => 'total_sales'
                  ));
                while($bestseller->have_posts()) : $bestseller->the_post(); 
            ?>	
                    <div class="product">
                        <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                </a>					
                                </div><!-- /.image -->
                                </div><!-- /.product-image -->
                            </div><!-- /.col -->
                            <div class="col2 col-xs-7">
                                <div class="product-info">
                                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">	
                                <span class="price"><?php echo $product->get_price_html(); ?></span>

                                </div><!-- /.product-price -->

                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->

                </div>
                
            <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
                <div class="item">
                <div class="products best-product">
                           
        <?php 
            $bestseller = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'order' => 'DESC',
                    'meta_key' => 'total_sales',
                    'offset' => 2
                  ));
                while($bestseller->have_posts()) : $bestseller->the_post(); 
            ?>	
                    <div class="product">
                        <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                </a>					
                                </div><!-- /.image -->
                                </div><!-- /.product-image -->
                            </div><!-- /.col -->
                            <div class="col2 col-xs-7">
                                <div class="product-info">
                                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">	
                                <span class="price"><?php echo $product->get_price_html(); ?></span>

                                </div><!-- /.product-price -->

                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
            <div class="item">
                <div class="products best-product">
                           
        <?php 
            $bestseller = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'order' => 'DESC',
                    'meta_key' => 'total_sales',
                    'offset' => 4
                  ));
                while($bestseller->have_posts()) : $bestseller->the_post(); 
            ?>	
                    <div class="product">
                        <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                </a>					
                                </div><!-- /.image -->
                                </div><!-- /.product-image -->
                            </div><!-- /.col -->
                            <div class="col2 col-xs-7">
                                <div class="product-info">
                                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">	
                                <span class="price"><?php echo $product->get_price_html(); ?></span>

                                </div><!-- /.product-price -->

                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
            <div class="item">
                <div class="products best-product">
                           
        <?php 
            $bestseller = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'order' => 'DESC',
                    'meta_key' => 'total_sales',
                    'offset' => 6
                  ));
                while($bestseller->have_posts()) : $bestseller->the_post(); 
            ?>	
                    <div class="product">
                        <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                </a>					
                                </div><!-- /.image -->
                                </div><!-- /.product-image -->
                            </div><!-- /.col -->
                            <div class="col2 col-xs-7">
                                <div class="product-info">
                                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">	
                                <span class="price"><?php echo $product->get_price_html(); ?></span>

                                </div><!-- /.product-price -->

                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
            <div class="item">
                <div class="products best-product">
                           
        <?php 
            $bestseller = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'order' => 'DESC',
                    'meta_key' => 'total_sales',
                    'offset' => 8
                  ));
                while($bestseller->have_posts()) : $bestseller->the_post(); 
            ?>	
                    <div class="product">
                        <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                </a>					
                                </div><!-- /.image -->
                                </div><!-- /.product-image -->
                            </div><!-- /.col -->
                            <div class="col2 col-xs-7">
                                <div class="product-info">
                                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">	
                                <span class="price"><?php echo $product->get_price_html(); ?></span>

                                </div><!-- /.product-price -->

                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
        </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== BEST SELLER : END ============================================== -->	

			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section wow fadeInUp new-arriavls">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
     <?php 
            $newarrival = new WP_Query(array(
                'post_type' => 'product',
                'stock' => 1, 
                'posts_per_page' => 12, 
                'orderby' =>'date',
                'order' => 'DESC'
            ));
        while($newarrival->have_posts()) : $newarrival->the_post();
        ?>
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
                                         
        </div><!-- /.product-price -->

        </div><!-- /.product-info -->
        </div><!-- /.product -->

        </div><!-- /.products -->   
        </div><!-- /.item -->
	
		<?php endwhile;  wp_reset_query(); ?>
   </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

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