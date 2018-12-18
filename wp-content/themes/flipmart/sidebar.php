<div class='col-md-3 sidebar'>
	            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <?php 
        global $product;
            wp_nav_menu(array(
            'theme_location' => 'sidebar-menu',
            'menu_class' => 'nav',
            'container' => ''
            ))
        ?>
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	            
<div class="sidebar-module-container">
	            	
	<div class="sidebar-filter">
		            	

		            	<!-- ============================================== PRICE SILDER============================================== -->
<div class="sidebar-widget wow fadeInUp">
	<div class="widget-header">
		<h4 class="widget-title">Price Slider</h4>
	</div>
	<div class="sidebar-widget-body m-t-10">
		<div class="price-range-holder">
      	    <span class="min-max">
                 <span class="pull-left">$200.00</span>
                 <span class="pull-right">$800.00</span>
            </span>
            <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

            <input type="text" class="price-slider" value="" >
   
        </div><!-- /.price-range-holder -->
        <a href="#" class="lnk btn btn-primary">Show Now</a>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRICE SILDER : END ============================================== -->
		            
		            	<!-- ============================================== COLOR============================================== -->
<div class="sidebar-widget wow fadeInUp">
	<div class="widget-header">
		<h4 class="widget-title">Colors</h4>
	</div>
	<div class="sidebar-widget-body">
		<ul class="list">
            <?php 
            $terms = get_the_terms( $product->id,'pa_color');
            if(!empty($terms)) {
               foreach($terms as $term){
            ?>
                <li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name;?></a></li>
           <?php } } ?>
          </ul>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== COLOR: END ============================================== -->
		            	<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
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
<div class="home-banner">
    <?php dynamic_sidebar('left-sidebar-bottom'); ?>
</div> 


	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->