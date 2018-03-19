<?php get_header(); ?>
	<div id="content">
		<?php get_template_part('slider'); ?>
		<div class="tab-product">
			<div class="container">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mới nhất</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Nổi bật</a>
				  	</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
				  	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				  		<div class="block-product">
				  			<div class="rew">
				  				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=10&post_type=product'); ?>
				  				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				  				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				  				<?php global $product; ?>
				  					<div class="list-pro">
					  					<div class="detail-pro">
					  						<div class="post-img">
					  							<span class="new">Mới</span>
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
				  				<?php endwhile; wp_reset_postdata(); ?>
				  				<div class="clear"></div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<div class="block-product">
				  			<div class="rew">
				  				<?php 
									$tax_query[] = array(
									    'taxonomy' => 'product_visibility',
									    'field'    => 'name',
									    'terms'    => 'featured',
									    'operator' => 'IN',
									);
								?>
								<?php $args = array( 'post_type' => 'product','posts_per_page' => 10,'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
								<?php $getposts = new WP_query( $args);?>
								<?php global $wp_query; $wp_query->in_the_loop = true; ?>
								<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
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
				  				<?php endwhile;  wp_reset_postdata(); ?>
				  				<div class="clear"></div>
				  			</div>
				  		</div>
				  	</div>
				</div>
			</div>
		</div>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_home') ) : ?><?php endif; ?>
		<div class="list-product news">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
						<div class="post-news">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active">Tin tức</a>
							  	</li>
							</ul>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
									<div class="post-one">
										<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&post_type=post&cat=1'); ?>
										<?php global $wp_query; $wp_query->in_the_loop = true; ?>
										<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
											<a href="<?php the_permalink(); ?>">
												<img src="<?php echo hk_get_thumb(get_the_id(), 600, 400); ?>" alt="<?php the_title(); ?>">
											</a>
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="meta">
												<span>Ngày đăng: <?php echo get_the_date('d-m-Y'); ?></span>
												<span>Lượt xem: <?php echo getpostviews(get_the_id()); ?></span>
											</div>
											<p><?php echo teaser(30); ?></p>
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
									<div class="list-news">
										<ul>
											<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&post_type=post&offset=1&cat=1'); ?>
											<?php global $wp_query; $wp_query->in_the_loop = true; ?>
											<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
												<li>
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo hk_get_thumb(get_the_id(), 120, 110); ?>" alt="<?php the_title(); ?>">
													</a>
													<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													<div class="date"><?php echo get_the_date('d-m-Y'); ?></div>
													<div class="clear"></div>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
						<div class="review-home">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active">Đanh giá khách hàng</a>
							  	</li>
							</ul>
							<?php $review = get_field('review', 'option'); ?>
							<div class="content-review">
								<div class="owl-carousel owl-theme">
									<?php foreach ($review as $key => $value) { ?>
										<div class="item">
									    	<p>
									    		<?php echo $value['review_customer']; ?>
									    	</p>
									    	<div class="rating">
									    		<i class="fa fa-star"></i>
									    		<i class="fa fa-star"></i>
									    		<i class="fa fa-star"></i>
									    		<i class="fa fa-star"></i>
									    		<i class="fa fa-star"></i>
									    	</div>
									    	<div class="menber">
									    		<img src="<?php echo $value['image_customer']; ?>" alt="<?php echo $value['name_customer']; ?>">
									    		<h3>-<?php echo $value['name_customer']; ?>-</h3>
									    	</div>
									    </div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>