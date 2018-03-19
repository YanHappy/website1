<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&amp;subset=vietnamese" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&amp;subset=vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/main.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php if(is_page()){ body_class(); } ?>>
		<div id="wrapper">
			<header>
				<div class="top-header">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="top-left pull-left">
									<p><?php the_field('welcom', 'option'); ?></p>
								</div>
								<div class="top-right pull-right">
									<div id="top-links" class="nav pull-right">
						              	<ul class="list-inline">
						                	<li class="dropdown">
						                		<a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						                			<i class="fa fa-user" aria-hidden="true"></i>
						                			<span>Tài khoản</span> 
						                			<span class="caret"></span>
						                		</a>
							                  	<ul class="dropdown-menu dropdown-menu-right">
							                    	<li><a href="<?php bloginfo( 'url' ); ?>/tai-khoan">Đăng ký</a></li>
							                    	<li><a href="<?php bloginfo( 'url' ); ?>/tai-khoan">Đăng nhập</a></li>
							                  	</ul>
						                	</li>
						                	<li>
						                		<a href="<?php bloginfo( 'url' ); ?>/yeu-thich" id="wishlist-total" title="Wish List (0)">
						                			<i class="fa fa-heart" aria-hidden="true"></i>
						                			<span>Yêu thích</span>
						                			<span>(0)</span>
						                		</a>
						                	</li>
						              	</ul>
						            </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="center-header">
					<div class="container">
						<div class="row">
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 mobile-style">
								<div class="logo">
									<a href="<?php bloginfo( 'url' ); ?>">
										<img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo( 'name' ); ?>">
									</a>
									<h1><?php bloginfo( 'name' ); ?></h1>
								</div>
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-3 mobile-style push-deskop6">
								<div class="box-cart pull-right">
									<a href="<?php bloginfo( 'url' ); ?>/gio-hang"><span id="cart-total"><span>Giỏ hàng</span><br><?php echo sprintf (_n( '%d Sản phẩm', '%d Sản phẩm', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></span></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 pull-deskop6">
								<div class="box-search">
									<form action="<?php bloginfo('url'); ?>/" method="GET" role="form">
										<input type="hidden" name="post_type" value="product">
										<?php $args = array(
											'show_option_all'    => '',
											'show_option_none' 	 => __( 'Danh mục' ),
											'option_none_value'  => '',
											'orderby'            => 'ID',
											'order'              => 'ASC',
											'show_count'         => 0,
											'hide_empty'         => 0,
											'child_of'           => 0,
											'exclude'            => array( 61, 101 ),
											'include'            => '',
											'echo'               => 1,
											'selected'           => 0,
											'hierarchical'       => 1,
											'name'               => 'product_cat',
											'id'                 => 'product_cat',
											'class'              => 'form-control',
											'depth'              => 0,
											'tab_index'          => 0,
											'taxonomy'           => 'product_cat',
											'hide_if_empty'      => false,
											'value_field'	     => 'slug',
										); ?>
										<?php wp_dropdown_categories( $args ); ?> 
										<input type="text" name="s" class="form-control" id="" placeholder="Từ khóa...">
										<button type="submit" class="button-search">Tìm kiếm</button>
										<div class="clear"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-header">
					<div class="container">
						<div class="menu-mobile">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="pull-left">MENU</div>
									<div class="pull-right click-menu"><span></span></div>
								</div>
							</div>
						</div>
						<div class="main-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'main_nav', 'container' => 'false', 'menu_id' => 'main-nav', 'menu_class' => 'menu-main-top') ); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</header>
			<?php if(!is_home()){ ?>
			<div class="bread">
				<div class="container">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs"><i class="fa fa-home"></i> ','</p>');} ?>	
				</div>
			</div>
			<?php } ?>