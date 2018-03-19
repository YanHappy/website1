<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="child-page">
					<div class="category-product">
						<div class="single-news">
							<h1><?php the_title(); ?></h1>
							<div class="meta"></div>
							<article class="post-content">
								<?php the_content(); ?>
							</article>
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