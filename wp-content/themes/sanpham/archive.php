<?php get_header(); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="child-page">
					<h1 class="title-cat"><span><?php the_archive_title(); ?></span></h1>
					<div class="category-product">
						<div class="category-news">
							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="list-news">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo hk_get_thumb(get_the_id(), 250, 200); ?>" alt="<?php the_title(); ?>">
									</a>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="meta">
										<span>Ngày đăng: <?php echo get_the_date('d - m - Y'); ?></span>
										<span>Lượt xem: <?php echo getpostviews(get_the_id()); ?></span>
									</div>
									<p><?php echo teaser(30); ?></p>
									<div class="more"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></div>
									<div class="clear"></div>
								</div>
							<?php endwhile; else : ?>
							<p>Rất tiếc! Chưa có bài viết trong chuyên mục!</p>
							<?php endif; ?>
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
<?php get_footer(); ?>