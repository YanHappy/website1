<div class="top-content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
				<div class="category-box">
					<h3><i class="fa fa-list" aria-hidden="true"></i> Danh mục sản phẩm</h3>
					<div class="content-cat">
						<ul>
							<?php $args = array( 
							    'hide_empty' => 0,
							    'taxonomy' => 'product_cat',
							    'exclude' => array( 61, 101 ),
							    'parent' => 0,
							    ); 
							    $cates = get_categories( $args ); 
							    foreach ( $cates as $cate ) {  ?>
									<li>
										<?php $icon = get_term_meta( $cate->term_id, $key = 'icon', $single = true ) ?>
										<a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>"> <?php echo $icon.$cate->name ?></a>
										<?php $args = array( 
										    'hide_empty' => 0,
										    'taxonomy' => 'product_cat',
										    'parent' => $cate->term_id,
										    ); 
										    $cates = get_categories( $args ); 
										?>
										<?php if(count($cates) > 0) { ?>
											<span class="down-menu"><i class="fa fa-sort-down"></i></span>
											<ul>
												<?php foreach ($cates as $cate) {  ?>
													<li>
														<a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>"><?php echo $cate->name ?></a>
													</li>
												<?php } ?>
											</ul>
											<div class="clear"></div>
										<?php } ?>
									</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="slider">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
					  	<div class="carousel-inner">
					  		<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&post_type=slider'); ?>
					  		<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					  		<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					  			<div class="carousel-item active">
					  				<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' =>'thumnail') ); ?>
							    </div>
					  		<?php endwhile; wp_reset_postdata(); ?>
						    <?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=10&post_type=slider&offset=1'); ?>
						    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
						    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
						    	<div class="carousel-item">
							     	<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' =>'thumnail') ); ?>
							    </div>
						    <?php endwhile; wp_reset_postdata(); ?>
					  	</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>