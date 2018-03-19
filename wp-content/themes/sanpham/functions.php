<?php 
include_once(get_template_directory().'/core/activation.php');
include_once(get_template_directory().'/core/plugins.php');
include_once(get_template_directory().'/core/custom-admin.php');
//include_once(get_template_directory().'/core/disable-updates.php');
include_once(get_template_directory().'/core/resize.php');
include_once(get_template_directory().'/widget/widget.php');
// setting tổng quan giao diện
function my_custom_wc_theme_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );
function settup_theme(){
	add_theme_support('post-thumbnails');
	add_filter('show_admin_bar', '__return_false');
	add_filter('post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter('image_send_to_editor', 'remove_width_attribute', 10 );
	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}
	if (function_exists('register_sidebar')){
		register_sidebar(array(
			'name'=> 'Sidebar Home',
			'id' => 'sidebar_home'
		));
		register_sidebar(array(
			'name'=> 'Cột phải',
			'id' => 'sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => "</div>\n",
			'before_title'  => '<h3 class="title"><span><i class="fa fa-bars" aria-hidden="true"></i>',
			'after_title'   => "</span></h3>\n",
		));
	}
	register_nav_menus(
		array(
			'main_nav' => 'Menu chính',
			'footer_acc' => 'Tài khoản',
			'footer_info' => 'Thông tin',
		)
	);
	function teaser($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'[...]';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt.'...';
	}
	function setpostview($postID){
	    $count_key ='views';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count == ''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    } else {
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	function getpostviews($postID){
	    $count_key ='views';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count == ''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}
	function wpc_unset_imagesizes($sizes){  
	    unset( $sizes['thumbnail']);  
	    unset( $sizes['medium']);  
	    unset( $sizes['medium_large']);  
	    unset( $sizes['large']);  
	}  
	add_filter('intermediate_image_sizes_advanced', 'wpc_unset_imagesizes'); 
	add_filter('max_srcset_image_width', create_function('', 'return 1;'));
	add_action('admin_head', 'wpds_custom_admin_post_css');
	function wpds_custom_admin_post_css() {
	    global $post_type;
	    if ($post_type == 'slider') {
	        echo "<style>#edit-slug-box {display:none;}</style>";
	    }
	}
}
add_action('init','settup_theme');
// Setting hình crop hình đại diện
function hk_get_thumb($id, $w, $h){
	if(get_post_thumbnail_id($id)){
		$url = wp_get_attachment_url( get_post_thumbnail_id($id));
	} else {
		$url = get_bloginfo('template_directory').'/no-thumb.jpg';
	}                                                        
	$image = huykira_image_resize($url, $w, $h, true, false);
	return $image['url'];	
}
function hk_get_image($url, $w, $h){
	$image = huykira_image_resize($url, $w, $h, true, false);
	return $image['url'];	
}
// Thêm icon menu 2 cấp
class Child_Wrap extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<i class=\"show-child-menu fa fa-angle-right\"></i><ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}
// Tạo post type slider
function slider_post_type(){
    $label = array(
        'name' => 'Ảnh slider',
        'singular_name' => 'slider',
    );
    $args = array(
        'labels' => $label,
        'description' => 'Post type đăng slider',
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-gallery', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
    register_post_type('slider', $args);
}
add_action('init', 'slider_post_type');
// Hiển thị slider bằng shortcode
// do_shortcode('[show_slider num="2"]'); -> Đoạn code hiển thị slider ra ngoài!
function create_shortcode_slider($args){
	if(isset($args['num'])){ ?>
		<style>
			div#carousel-id {margin-bottom: 20px;}
			div#carousel-id img{width: 100%}
			.carousel-control {background: none!important;}
		</style>
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php
					$i = 1;
					$getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$args['num'].'&post_type=slider'); 
					global $wp_query; $wp_query->in_the_loop = true;
					while ($getposts->have_posts()) : $getposts->the_post();
					if($i == 1){ ?>
						<div class="item active">
							<?php echo get_the_post_thumbnail(get_the_id(), 'full', array( 'class' =>'thumnail') ); ?>
						</div>
					<?php } else { ?>
						<div class="item">
							<?php echo get_the_post_thumbnail(get_the_id(), 'full', array( 'class' =>'thumnail') ); ?>
						</div>
					<?php } $i++;
					endwhile; wp_reset_postdata();
				?>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	<?php }
}
add_shortcode('show_slider', 'create_shortcode_slider');
// Loại bỏ 1 bài viết ra khỏi hệ thống tìm kiếm
add_action('pre_get_posts','one_exclude_posts_from_search');
function one_exclude_posts_from_search( $query ){
    if( $query->is_main_query() && is_search() ){
        $post_ids = array(109);
        $query->set('post__not_in', $post_ids);
    }
}
// Tăng số lượng từ mô tả lên 300
function custom_excerpt_length( $length ) {
	return 300;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// Lấy tất cả những hình ảnh trong bài viết
function get_link_img_post(){
	global $post;
	preg_match_all('/src="(.*)"/Us',get_the_content(),$matches);
	$link_img_post = $matches[1];
	return $link_img_post;
}
// Thay thể mộ số từ chưa được dịch
function change_text_menu_title( $translated ){
    $translated = str_replace( 'Contact', 'Liên hệ', $translated );
    $translated = str_replace( 'Tóm tắt', 'Nội dung mô tả', $translated );
    return $translated;
}
add_filter( 'gettext', 'change_text_menu_title' );
// Mộ số đoạn code tăng tốc wp
function ac_remove_cf7_scripts() {
	if ( !is_page() && !is_single() ) {
		wp_deregister_style( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );
function disable_emojis_tinymce($plugins) {
	if(is_array($plugins)){
	    return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	   	return array();
	}
}
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.1' );
    }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
function jquery_cdn() {
   	if (!is_admin()) {
      	wp_deregister_script('jquery');
      	wp_register_script('jquery', '', false, '1.8.3');
      	wp_enqueue_script('jquery');
   	}
}
add_action('init', 'jquery_cdn');
function my_deregister_scripts(){
  	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
// Xử lý ajax đơn giản
add_action('wp_ajax_Like_action', 'Like_action');
add_action('wp_ajax_nopriv_Like_action', 'Like_action');
function Like_action() {
    $id = isset($_POST['data']) ? (int)$_POST['data'] : false;
    if (isset($_COOKIE['like'])) {
		$array = unserialize($_COOKIE['like']);
		$array[$id] = $id;
		setcookie('like', serialize($array), time() + 3600);
		echo $_COOKIE['like'];
	} else {
		$array = array();
		$array[$id] = $id;
		setcookie('like', serialize($array), time() + 3600);
		echo $_COOKIE['like'];
	}
die(); }
// Lấy user mặc định
$current_user = wp_get_current_user();
$lever = $current_user->user_level;
if($lever < 6){}
// Tùy chỉnh website bằng ACF PRO
// the_field('logo', 'option'); -> Hiển thị ra ngoài nhé!
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Tùy chỉnh website',
		'menu_title'	=> 'Tùy chỉnh',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
function the_price_pro($id){ ?>
	<?php global $product; ?>
	<?php $price_sale = get_post_meta($id,'_sale_price',true); ?>
	<?php $price_regular = get_post_meta($id,'_regular_price',true); ?>
	<?php if($price_sale){ ?>
		<span class="price"><?php echo number_format($price_sale,0,",","."); ?> đ</span>
		<span class="price-old"><?php echo number_format($price_regular,0,",","."); ?> đ</span>
	<?php } else { ?>
		<span class="price"><?php echo number_format($product->regular_price,0,",","."); ?> đ</span>
	<?php } ?>
<?php }