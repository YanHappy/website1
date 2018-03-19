<?php
include_once(get_template_directory().'/widget/widget-newpost.php');
include_once(get_template_directory().'/widget/widget-toppost.php');
class Post_Category_widget extends WP_Widget {
  	function Post_Category_widget() {
	    $widget_ops = array( 'classname' => 'post_category_widget', 'description' => 'Hiển thị sản phẩm theo danh mục ở trang chủ' );
	    $control_ops = array( 'id_base' => 'post_category_widget' ); 
	    $this->WP_Widget( 'Post_Category_widget', '+HK - Category Product (ST1)', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title      = $instance['title'];
      	$num        = $instance['num'];
      	$cat_id     = $instance['cat_id'];
		if ( !defined('ABSPATH') )
  		die('-1'); ?>
			<div class="list-product">
				<div class="container">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  	<li class="nav-item">
					    	<a class="nav-link active"><?php echo $title; ?></a>
					  	</li>
					</ul>
					<div class="block-product">
			  			<div class="rew">
			  				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$num.'&post_type=product&product_cat='.$cat_id); ?>
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
			  				<?php endwhile; wp_reset_postdata(); ?>
			  				<div class="clear"></div>
			  			</div>
			  		</div>
		  		</div>
			</div>
		<?php
  	} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['num']   	= $new_instance['num'];
      	$instance['cat_id']	= $new_instance['cat_id'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' => 'Tiêu đề',
		    'num' => 10,
		    'cat_id' => 1,
		);
  		$instance = wp_parse_args((array) $instance, $defaults ); ?>
	    <p>
	      	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nhập tiêu đề: '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>"  />
	    </p>
	    <p>
	      	<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Nhập số lượng bài viết : '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="number" value="<?php echo $instance['num']; ?>" />
	    </p>
	    <p class="cate-kira">
	      	<label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e('Chọn chuyên mục: '); ?></label>
		    <?php
		        wp_dropdown_categories( array(
		          	'orderby'   	=> 'count',
		          	'hide_empty' 	=> false,
		          	'taxonomy'		=> 'product_cat',
		          	'hierarchical' 	=> 1,
		          	'name'       	=> $this->get_field_name( 'cat_id' ),
		          	'id'         	=> 'recent_posts_category',
		          	'class'      	=> 'widefat',
		          	'selected'   	=> $instance['cat_id'],
		          	'value_field'	=> 'slug',
		        ));
		    ?>
	    </p>
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("Post_Category_widget");'));