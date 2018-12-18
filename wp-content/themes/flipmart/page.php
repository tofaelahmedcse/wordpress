<?php get_header(); ?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
                    <?php while(have_posts()) : the_post(); ?>
                        <div class="blog-post  wow fadeInUp">

                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                            <?php the_content(); ?>

                        </div>
                    <?php endwhile; ?>
			     </div>
				<?php get_template_part('right-sidebar'); ?>
	         </div>
        </div>
						<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">					
			<a class="item" title="Phone" href="category.html">Phone</a>
			<a class="item active" title="Vest" href="category.html">Vest</a>
			<a class="item" title="Smartphone" href="category.html">Smartphone</a>
			<a class="item" title="Furniture" href="category.html">Furniture</a>
			<a class="item" title="T-shirt" href="category.html">T-shirt</a>
			<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
			<a class="item" title="Sneaker" href="category.html">Sneaker</a>
			<a class="item" title="Toys" href="category.html">Toys</a>
			<a class="item" title="Rose" href="category.html">Rose</a>
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand1.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand2.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand3.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand5.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand6.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand2.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand1.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brands/brand5.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
</div>
<?php get_footer(); ?>