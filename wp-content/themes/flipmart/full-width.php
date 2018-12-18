<?php 
/*
Template Name: Full Width
*/

get_header(); 
?>
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
				<div class="col-md-12">
                    <?php while(have_posts()) : the_post(); ?>
                        <div class="blog-post  wow fadeInUp">

                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                            <?php the_content(); ?>

                        </div>
                    <?php endwhile; ?>
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
			</div>
		</div>
			</div>
</div>
<?php get_footer(); ?>