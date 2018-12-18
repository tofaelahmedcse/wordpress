<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal" role="navigation">
            <?php 
            wp_nav_menu(array(
            'theme_location' => 'sidebar-menu',
            'menu_class' => 'nav',
            'container' => ''
            ))
        ?>
        </nav><!-- /.megamenu-horizontal -->
    </div><!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->

   
 <!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">Accessories</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            <?php 
            $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'product_cat' => 'accessories'
                  ));
                while($loop->have_posts()) : $loop->the_post(); global $product;
            ?>	
                    <div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									<?php echo $product->get_price_html(); ?>
								</span>				
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->
					</div>	
					</div>	
       	
        <?php endwhile; wp_reset_query(); ?> 
    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->


			<!-- ============================================== SPECIAL OFFER ============================================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Sunglass</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
	       <div class="item">
                <div class="products special-product">
                    <?php 
                        $loop = new WP_Query(array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'product_cat' => 'sunglasses'
                          ));
                        while($loop->have_posts()) : $loop->the_post(); global $product;
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
                        <div class="col col-xs-7">
                        <div class="product-info">
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price">	
                        <span class="price">
                        <?php echo $product->get_price_html(); ?>		
                        </span>

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
                <div class="products special-product">
                    <?php 
                        $loop = new WP_Query(array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'offset' => 3,
                            'product_cat' => 'sunglasses'
                          ));
                        while($loop->have_posts()) : $loop->the_post(); global $product;
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
                        <div class="col col-xs-7">
                        <div class="product-info">
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price">	
                        <span class="price">
                        <?php echo $product->get_price_html(); ?>		
                        </span>

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
                <div class="products special-product">
                    <?php 
                        $loop = new WP_Query(array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'offset' => 6,
                            'product_cat' => 'sunglasses'
                          ));
                        while($loop->have_posts()) : $loop->the_post(); global $product;
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
                        <div class="col col-xs-7">
                        <div class="product-info">
                        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price">	
                        <span class="price">
                        <?php echo $product->get_price_html(); ?>		
                        </span>

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
<!-- ============================================== SPECIAL OFFER : END ============================================== -->
			<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">	
            <?php 
                $terms = get_terms( 'product_tag', array(
                                    'hide_empty' => false,
                                    'orderby' => 'name',
                                    'posts_per_page' => 9
                                    
                                ) );
                   if(!empty($terms)) {
                       foreach($terms as $term){
            ?>			
			<a class="item" title="" href="<?php echo get_tag_link( $term->term_id); ?>"><?php echo $term->name; ?></a>
			<?php } } ?>
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->
			<!-- ============================================== SPECIAL DEALS ============================================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Fruites</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            <div class="item">
            <div class="products special-product">
             <?php 
                $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'product_cat' => 'fruites'
                  ));
                while($loop->have_posts()) : $loop->the_post(); global $product;
             ?>	
                <div class="product">
                <div class="product-micro">
                <div class="row product-micro-row">
                <div class="col col-xs-5">
                <div class="product-image">
                <div class="image">
                <a href="<?php the_permalink() ;?>">
                <img src="<?php echo get_the_post_thumbnail_url();?>"  alt="">
                </a>					
                </div><!-- /.image -->


                </div><!-- /.product-image -->
                </div><!-- /.col -->
                <div class="col col-xs-7">
                <div class="product-info">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price">	
                <span class="price">
                    <?php echo $product->get_price_html(); ?>	
                </span>

                </div><!-- /.product-price -->

                </div>
                </div><!-- /.col -->
                </div><!-- /.product-micro-row -->
                </div><!-- /.product-micro -->

                </div>
            <?php endwhile; ?>

            </div>
            </div>
            <div class="item">
            <div class="products special-product">
             <?php 
                $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'offset' => 3,
                    'product_cat' => 'fruites'
                  ));
                while($loop->have_posts()) : $loop->the_post(); global $product;
             ?>	
                <div class="product">
                <div class="product-micro">
                <div class="row product-micro-row">
                <div class="col col-xs-5">
                <div class="product-image">
                <div class="image">
                <a href="<?php the_permalink() ;?>">
                <img src="<?php echo get_the_post_thumbnail_url();?>"  alt="">
                </a>					
                </div><!-- /.image -->


                </div><!-- /.product-image -->
                </div><!-- /.col -->
                <div class="col col-xs-7">
                <div class="product-info">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price">	
                <span class="price">
                    <?php echo $product->get_price_html(); ?>	
                </span>

                </div><!-- /.product-price -->

                </div>
                </div><!-- /.col -->
                </div><!-- /.product-micro-row -->
                </div><!-- /.product-micro -->

                </div>
            <?php endwhile; ?>

            </div>
            </div>
            <div class="item">
            <div class="products special-product">
             <?php 
                $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'offset' => 6,
                    'product_cat' => 'fruites'
                  ));
                while($loop->have_posts()) : $loop->the_post(); global $product;
             ?>	
                <div class="product">
                <div class="product-micro">
                <div class="row product-micro-row">
                <div class="col col-xs-5">
                <div class="product-image">
                <div class="image">
                <a href="<?php the_permalink() ;?>">
                <img src="<?php echo get_the_post_thumbnail_url();?>"  alt="">
                </a>					
                </div><!-- /.image -->


                </div><!-- /.product-image -->
                </div><!-- /.col -->
                <div class="col col-xs-7">
                <div class="product-info">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price">	
                <span class="price">
                    <?php echo $product->get_price_html(); ?>	
                </span>

                </div><!-- /.product-price -->

                </div>
                </div><!-- /.col -->
                </div><!-- /.product-micro-row -->
                </div><!-- /.product-micro -->

                </div>
            <?php endwhile; ?>

            </div>
            </div>
	   </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== SPECIAL DEALS : END ============================================== -->

<div class="home-banner">
    <?php dynamic_sidebar('left-sidebar-bottom'); ?>
</div> 



</div><!-- /.sidemenu-holder -->