<?php get_header(); ?>
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
					<?php global $id_ahihi; ?>
					<?php $id_ahihi = 1; ?>
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
					<div class="child-page">
						<?php if (have_posts()) : ?>
						<h1 class="title-cat">
							<span><?php woocommerce_page_title(); ?></span>
						</h1>
						<div class="category-product">
							<div class="top-pro-list">
								<?php do_action( 'woocommerce_before_shop_loop' ); ?>
								<div class="clear"></div>
							</div>
							<div class="rew">
								<?php while (have_posts()) : the_post(); ?>
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
				  				<div class="clear"></div>
							</div>
							<?php if(paginate_links()!='') {?>
							<div class="quatrang">
								<?php
								global $wp_query;
								$big = 999999999;
								echo paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'prev_text'    => __('«'),
									'next_text'    => __('»'),
									'current' => max( 1, get_query_var('paged') ),
									'total' => $wp_query->max_num_pages
									) );
							    ?>
							</div>
							<?php } ?>
						</div>
						<?php else : ?>
							<h1 class="title-cat">
								<span><?php woocommerce_page_title(); ?></span>
							</h1>
							<div class="category-product">
								<p>Không có bài sản phẩm trong chuyên mục!</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>