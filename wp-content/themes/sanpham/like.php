<?php
/*
 * Template Name: Favorite page
 */
?>
<?php get_header(); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="child-page">
					<div class="category-product">
						<div class="single-news">
							<h1><?php the_title(); ?></h1>
						</div>
						<?php if ($_COOKIE['like']) { $array = unserialize($_COOKIE['like']); ?>
						<div class="tab-product">
							<div class="tab-content">
								<div class="block-product">
						  			<div class="rew">
						  				<?php $my_query = new WP_Query( 
						  					array(
						  						'post_type' => 'product',
						  						'post_status' => 'publish',
						  						'post__in' => $array)
						  				);
										while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
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
						  				<?php endwhile; wp_reset_postdata(); ?>
						  				<div class="clear"></div>
						  			</div>
						  		</div>
					  		</div>
				  		</div>
				  		<?php } else { ?>
				  		<div class="single-news">
				  			<article class="post-content">
								<p style="margin-bottom: 0">Chưa có sản phẩm yêu thích nào trong danh sách!</p>
							</article>
				  		</div>
				  		<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>