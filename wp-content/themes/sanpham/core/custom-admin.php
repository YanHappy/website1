<?php 
	add_action('admin_init', 'rw_remove_dashboard_widgets');
    function rw_remove_dashboard_widgets() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // plugins
        remove_meta_box('dashboard_quick_press', 'dashboard', 'normal'); // quick press
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); // recent drafts
        remove_meta_box('dashboard_primary', 'dashboard', 'normal'); // wordpress blog
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // other wordpress news
	}
	function remove_admin_bar_links() {
    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');          /** Remove the WordPress logo **/
	    //$wp_admin_bar->remove_menu('wporg');            /** Remove the WordPress.org link **/
	    //$wp_admin_bar->remove_menu('documentation');    /** Remove the WordPress documentation link **/
	    //$wp_admin_bar->remove_menu('support-forums');   /** Remove the support forums link **/
	    //$wp_admin_bar->remove_menu('feedback');         /** Remove the feedback link **/
	    //$wp_admin_bar->remove_menu('view-site');        /** Remove the view site link **/
	    //$wp_admin_bar->remove_menu('wpseo-menu');        /** Remove the view site link **/
	    //$wp_admin_bar->remove_menu('updates');          /** Remove the updates link **/
	    //$wp_admin_bar->remove_menu('comments');         /** Remove the comments link **/
	    //$wp_admin_bar->remove_menu('new-content');      /** Remove the content link **/
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	add_action( 'admin_menu', 'my_remove_menus', 999 );
	function my_remove_menus() {
		// remove_menu_page( 'upload.php');
		// remove_menu_page( 'edit-comments.php' );
		// remove_menu_page( 'wpcf7');
		// remove_menu_page( 'themes.php');
		// remove_menu_page( 'plugins.php');
		// remove_menu_page( 'users.php');
		// remove_menu_page( 'tools.php');
		// remove_menu_page( 'options-general.php');
		// remove_menu_page( 'wpseo_dashboard');
		// remove_menu_page( 'wpcf-cpt');
		// remove_submenu_page( 'themes.php', 'theme-editor.php');
		// remove_submenu_page( 'plugins.php', 'plugin-editor.php');
	}

	add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
    function my_custom_dashboard_widgets() {
        global $wp_meta_boxes;
        wp_add_dashboard_widget('custom_help_widget', 'Giới thiệu', 'custom_dashboard_help');
    }
     function custom_dashboard_help() { ?>
	    <h2>Chào mừng đến với Hệ thống Quản Trị Website</h2>
	    <p><strong>THÔNG TIN WEBSITE</strong></p>
	    <P><?php echo bloginfo( 'name' ); ?></p>
	    <p><strong>NHÀ PHÁT TRIỂN</strong></p>
	    <p>Hệ thống được phát triển bởi <a href="http://huykira.net/"><strong>HUY KIRA</strong></a></p>
	    <p>Mọi yêu cầu, hỗ trợ quý khách hàng có thể liên hệ <strong>Kỹ Thuật</strong></p>
	    <p><strong>Điện thoại</strong>: 01658 949 680</p> 
	<?php }

    add_filter('admin_title', 'my_admin_title', 10, 2);
	function my_admin_title($admin_title, $title){
	    return $title.' &lsaquo; '.get_bloginfo('name').' &lsaquo; '.'';
	}

	function remove_footer_admin () {
	    echo 'By Huy Kira';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');
	add_action( 'widgets_init', 'my_unregister_widgets' );
	function my_unregister_widgets() {
	    unregister_widget('WP_Widget_Pages');
	    unregister_widget('WP_Widget_Calendar');
	    unregister_widget('WP_Widget_Archives');
	    unregister_widget('WP_Widget_Links');
	    unregister_widget('WP_Widget_Meta');
	    unregister_widget('WP_Widget_Search');
	    unregister_widget('WP_Widget_Categories');
	    unregister_widget('WP_Widget_Recent_Posts');
	    unregister_widget('WP_Widget_Recent_Comments');
	    unregister_widget('WP_Widget_RSS');
	    unregister_widget('WP_Widget_Tag_Cloud');
	    unregister_widget('WP_Nav_Menu_Widget');
	}