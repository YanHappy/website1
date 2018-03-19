			<footer>
				<div class="top-footer">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
								<div class="sub-mail">
									<div class="mail-text">
										<i class="fa fa-envelope"></i>
										<p>
											<span>Đăng ký nhận email</span>
											Nhập mail để nhận thông báo mới nhất khi có nguyễn mãi
										</p>
									</div>
									<form action="" method="POST" role="form">
										<input type="text" placeholder="Email" name="s-mail" class="form-control">
										<button type="submit" class="btn btn-primary">Đăng ký</button>
									</form>
									<div class="clear"></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
								<div class="top-social-footer">
									<ul>
										<li><a target="_blank" href="<?php the_field('fb', 'option'); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a target="_blank" href="<?php the_field('go', 'option'); ?>" class="google"><i class="fa fa-google-plus"></i></a></li>
										<li><a target="_blank" href="<?php the_field('tw', 'option'); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a target="_blank" href="<?php the_field('yo', 'option'); ?>" class="linkedin"><i class="fa fa-youtube"></i></a></li>
										<li><a target="_blank" href="<?php the_field('in', 'option'); ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="content-footer">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
								<div class="block-ft">
									<h3>Thông tin liên hệ</h3>
									<div class="block-content-ft">
										<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo( 'name' ) ?>"></a>
										<p><?php the_field('text_footer', 'option'); ?></p>
										<div class="info-contact">
											<p><span><i class="fa fa-home"></i> Địa chỉ:</span> <?php the_field('address', 'option'); ?></p>
											<p><span><i class="fa fa-envelope-open"></i> Email:</span> <?php the_field('email', 'option'); ?></p>
											<p><span><i class="fa fa-phone"></i> Điện thoại:</span> <?php the_field('phone', 'hotline'); ?> -  <?php the_field('hotline', 'option'); ?></p>
											<p><span><i class="fa fa-globe"></i> Website:</span> <?php bloginfo( 'url' ); ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
								<div class="block-ft">
									<h3>Tài khoản</h3>
									<div class="block-content-ft">
										<?php wp_nav_menu( array( 'theme_location' => 'footer_acc', 'container' => 'false', 'menu_id' => 'main-nav', 'menu_class' => 'menufooter_acc') ); ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
								<div class="block-ft">
									<h3>Thông tin</h3>
									<div class="block-content-ft">
										<?php wp_nav_menu( array( 'theme_location' => 'footer_info', 'container' => 'false', 'menu_id' => 'main-nav', 'menu_class' => 'menufooter_info') ); ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
								<div class="block-ft">
									<h3>Facebook</h3>
									<div class="block-content-ft">
										<div class="fb-page" data-href="<?php the_field('fb', 'option'); ?>" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p><?php the_field('copyr', 'option'); ?></p>
				</div>
				<a class="back-to-top"><i class="fa fa-angle-up"></i></a>
			</footer>
		</div>
		<script src="<?php bloginfo( 'template_directory' ); ?>/script/all.js"></script>
		<script>
			var Home = '<?php echo get_site_url() ?>';
			var title = $('.title-product span').text();
			$('.form-control-num').val(1);
			$('.qty').change(function(event) {
				var num = $('.qty').val();
				$('.form-control-num').val(num);
				$('.num-pro').text(num);
			});
			$('.title-p').val(title);
			$('.click-love').click(function(event) {
				event.preventDefault();
				var id = $(this).data('id');
				$.ajax({
			        type: 'POST',
			        url: Home+'/wp-admin/admin-ajax.php',
			        data: {
			            'action' : 'Like_action', 
			            'data': id
			        },
			        beforeSend: function () {
			          //  $('.load-ajax').show();
			        },
			        success: function (data) {
			            console.log(data);
			        },
			    });
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>