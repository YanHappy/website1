<?php
/*
 * Template Name: contact page
 */
?>
<?php get_header(); ?>
	<div id="content">
		<div class="container">
			<div class="map-page">
				<?php the_field('google_map', 'option'); ?>
			</div>
		</div>
		<div class="info-contact-page">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
						<div class="block-content-ft-contact">
							<h1>Liên hệ</h1>
							<p><?php the_field('text_footer', 'option'); ?></p>
							<div class="info-contact">
								<p><span><i class="fa fa-home"></i> Địa chỉ:</span> <?php the_field('address', 'option'); ?></p>
								<p><span><i class="fa fa-envelope-open"></i> Email:</span> <?php the_field('email', 'option'); ?></p>
								<p><span><i class="fa fa-phone"></i> Điện thoại:</span> <?php the_field('phone', 'hotline'); ?> -  <?php the_field('hotline', 'option'); ?></p>
								<p><span><i class="fa fa-globe"></i> Website:</span> <?php bloginfo( 'url' ); ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
						<div class="form-contact">
							<?php echo do_shortcode('[contact-form-7 id="4" title="Liên  hệ"]'); ?>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>