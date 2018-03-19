<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php echo setpostview(get_the_id()); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="child-page">
					<div class="category-product">
						<div class="single-news">
							<h1><?php the_title(); ?></h1>
							<div class="meta">
								<span>Ngày đăng: <?php echo get_the_date('d-m-Y'); ?></span>
								<span>Lượt xem: <?php echo getpostviews(get_the_id()); ?></span>
							</div>
							<article class="post-content">
								<?php the_content(); ?>
							</article>
							<div class="share-ico">
								<span class="like">
									<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
									<script src="https://apis.google.com/js/platform.js" async defer></script>
								  	<g:plusone size="medium"></g:plusone>
								</span>
							</div>
							<?php if(get_tags()){ ?>
							<div class="tags"> 
								<span><i class="fa fa-tags"></i> Từ khóa: </span>
								<?php the_tags('',', '); ?>
							</div>
							<?php } ?>
							<div class="cmt-fb">
								<div class="cmt">
									<div class="fb-comments" data-width="100%" data-href="" data-numposts="3"></div>
								</div>
							</div>
						</div>
						<div class="rel-post">
							<h3><span><i class="fa fa-globe"></i>Bài viết liên quan</span></h3>
							<div class="content-rel">
								<div class="row">
									<?php
									    $categories = get_the_category($post->ID);
									    if ($categories) {
									        $category_ids = array();
									        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
									        $args=array(
									        'category__in' => $category_ids,
									        'post__not_in' => array($post->ID),
									        'showposts'=>6, // Số bài viết bạn muốn hiển thị.
									        'caller_get_posts'=>1
									        );
									        $my_query = new wp_query($args);
									        if( $my_query->have_posts() ) {
									            while ($my_query->have_posts()){
								                $my_query->the_post(); ?>
									                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
														<div class="detail-post-news">
															<a href="<?php the_permalink(); ?>">
																<img src="<?php echo hk_get_thumb(get_the_id(), 250, 200); ?>" alt="<?php the_title(); ?>">
															</a>
															<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
															<div class="meta">
																<span>Ngày đăng: <?php echo get_the_date('d-m-Y'); ?></span>
															</div>
														</div>
													</div>
								                <?php }
									        }
									    }
									?>
								</div>
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
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>