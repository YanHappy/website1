<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<div id="content">
		<div class="container">
			<div class="detail-product">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
						<div class="images-product">
							<div id="lightgallery">
								<div class="big-img">
									<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" class="kira">
										<img src="<?php echo hk_get_thumb(get_the_id(), 600, 450); ?>" alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="thumb-img">
									<?php
									 	global $product;
									 	$attachment_ids = $product->get_gallery_attachment_ids();
									 	if(count($attachment_ids) > 0) {
											foreach( $attachment_ids as $attachment_id ) {
										  		$image_link = wp_get_attachment_url( $attachment_id ); ?>
												<a href="<?php echo $image_link; ?>" class="kira">
													<img src="<?php echo hk_get_image($image_link, 300, 200) ?>" alt="<?php the_title(); ?>">
												</a>
										  	<?php
											}
										}
									?>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
						<div class="info-product">
							<h1 class="title-product">
								<span><?php the_title(); ?></span>
							</h1>
							<div class="star">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="meta-post">
	  							<?php the_price_pro(get_the_id()); ?>
	  						</div>
	  						<div class="decs-info">
	  							<h4>Mô tả</h4>
	  							<?php the_excerpt(); ?>
	  						</div>

	  						<form class="cart" method="post" enctype="multipart/form-data">
								<div class="quantity">
									<label class="screen-reader-text" for="quantity_5a7db80c8b44e">Số lượng: </label>
									<input type="number" id="quantity_5a7db80c8b44e" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
										<button type="submit" name="add-to-cart" value="<?php the_id(); ?>" class="single_add_to_cart_button button alt">
											Thêm vào giỏ hàng
											<span>Giao tận nơi hoặc ở shop</span>
										</button>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
										<a class="buy-now" href="#" data-toggle="modal" data-target="#myModal">
											Mua hàng ngay
											<span>Nhanh chóng - tiện lợi</span>
										</a>
									</div>
								</div>
								<div class="clear"></div>
							</form>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  	<div class="modal-dialog" role="document">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Mua hàng nhanh</h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          	<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
								      	<div class="modal-body">
								        	<div class="pro-duct">
								        		<img src="<?php echo hk_get_thumb(get_the_id(), 300, 300); ?>" alt="<?php the_title(); ?>">
								        		<h4><?php the_title(); ?></h4>
								        		<div class="meta-post">
						  							<?php the_price_pro(get_the_id()); ?>
						  						</div>
						  						<p class="number">
						  							<strong>Số lượng:</strong> 
						  							<span class="num-pro">1</span>
						  						</p>
						  						<div class="clear"></div>
								        	</div>
								        	<h5 class="press">Nhập thông tin</h5>
								        	<p class="detail-decs">
								        		Chúng tôi sẽ liên hệ lại ngay sau khi bạn đặt hàng!
								        	</p>
								        	<div class="form-contact-buy">
												<?php echo do_shortcode('[contact-form-7 id="242" title="Đặt hàng nhanh"]'); ?>
											</div>			
								      	</div>
								    </div>
							  	</div>
							</div>
							<div class="call-in">
								<p>Gọi <span>1800-6601</span> để được tư vấn (miễn phí cuộc gọi)</p>
							</div>
							<span class="like">
								<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
								<script src="https://apis.google.com/js/platform.js" async defer></script>
							  	<g:plusone size="medium"></g:plusone>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
					<div class="content-post-detail">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						  	<li class="nav-item">
						    	<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Chi tiết sản phẩm</a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bình luận</a>
						  	</li>
						</ul>
					</div>
					<div class="tab-content" id="pills-tabContent">
					  	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  		<div class="product-common">
						  		<article class="post-content">
									<?php the_content(); ?>
								</article>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="product-common">
								<div class="cmt">
									<div class="fb-comments" data-width="100%" data-href="<?php the_permalink(); ?>" data-numposts="3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="list-product">
			<div class="container">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active">Sản phẩm liên quan</a>
				  	</li>
				</ul>
				<div class="block-product">
		  			<div class="rew">
		  				<?php 
						global $product, $woocommerce_loop;
						if ( empty( $product ) || ! $product->exists() ) {
							return;
						}
						$related = $product->get_related( $posts_per_page );
						if ( sizeof( $related ) === 0 ) return;
						$args = apply_filters( 'woocommerce_related_products_args', array(
							'post_type'            => 'product',
							'ignore_sticky_posts'  => 1,
							'no_found_rows'        => 1,
							'posts_per_page'       => 10,
							'orderby'              => $orderby,
							'post__in'             => $related,
							'post__not_in'         => array( $product->id )
						) );

						$products = new WP_Query( $args );
						if ( $products->have_posts() ) : ?>
						<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<?php global $product; ?>
						<div class="list-pro">
		  					<div class="detail-pro">
		  						<div class="post-img">
		  							<a href="<?php the_permalink(); ?>">
		  								<img src="<?php echo hk_get_thumb(get_the_id(), 300, 300); ?>" alt="<?php the_title(); ?>">
		  							</a>
		  							<div class="detail-mask">
		  								<div class="button">
		  									<a href="#" class="click-love" data-id="<?php the_id(); ?>"><i class="fa fa-heart-o"></i></a>
		  									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
		  								</div>
		  							</div>
		  						</div>
		  						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		  						<div class="meta-post">
		  							<?php the_price_pro(get_the_id()); ?>
		  						</div>
		  						<div class="add-to-cart">
		  							<a href="<?php bloginfo( 'url' ); ?>?add-to-cart=<?php the_id(); ?>">
		  								<i class="fa fa-shopping-basket"></i> Mua ngay
		  							</a>
		  						</div>
		  					</div>
		  				</div>
						<?php endwhile; ?>
						<?php endif; wp_reset_postdata(); ?>
		  				<div class="clear"></div>
		  			</div>
		  		</div>
	  		</div>
		</div>
	</div>
<?php endwhile;?>
<?php endif; ?>
<?php get_footer(); ?>