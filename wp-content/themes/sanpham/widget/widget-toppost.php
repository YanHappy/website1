<?php
class Posttop_Category_widget extends WP_Widget {
  	function Posttop_Category_widget() {
	    $widget_ops = array( 'classname' => 'posttop_category_widget', 'description' => 'Hiển thị bài viết mới nhất' );
	    $control_ops = array( 'id_base' => 'posttop_category_widget' ); 
	    $this->WP_Widget( 'Posttop_Category_widget', '+HK - Top Post sidebar ', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title      = $instance['title'];
      	$num        = $instance['num'];
		if ( !defined('ABSPATH') )
  		die('-1');
  		echo $before_widget; 
  		echo $before_title.$title.$after_title; ?>
  		<div class="content-new">
			<ul>
				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$num.'&post_type=post&meta_key=views&orderby=meta_value_num'); ?>
				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(), 80, 80); ?>"  alt="<?php the_title(); ?>"></a>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="meta"><span>Ngày đăng: <?php echo get_the_date('d - m - Y'); ?></span></div>
						<div class="clear"></div>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
  	<?php echo $after_widget;
  	} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['num']   	= $new_instance['num'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' => 'Tiêu đề',
		    'num' => 5,
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
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("Posttop_Category_widget");'));