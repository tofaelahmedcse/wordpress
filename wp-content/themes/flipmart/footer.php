<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flipmart
 */

?>

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                
                <?php dynamic_sidebar('footer-widget'); ?>
                
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-4 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="<?php global $flipmart; echo $flipmart['social-link']['1'];?>" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['2'];?>" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['3'];?>" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['4'];?>" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['5'];?>" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['6'];?>" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="<?php echo $flipmart['social-link']['7'];?>" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <?php 
                           $payment_logos = $flipmart['payment-method'];
                            $payment_logos = explode(",", $payment_logos);

                            foreach($payment_logos as $payment_logo) :
                        ?>
                            <li><img src="<?php $imag_var = wp_get_attachment_image_src($payment_logo); echo $imag_var[0]; ?>" alt=""></li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
            <div class="col-xs-12 col-sm-4 no-padding">
                <div class="clearfix payment-methods">
                   <font color="white">
                     Design &amp; Developed By <a href="https://www.webtricker.com/" target="_blank" style="color:#59b210; font-weight:bold">Webtricker</a>
                  </font>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->

	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<?php wp_footer(); ?>

</body>
</html>
