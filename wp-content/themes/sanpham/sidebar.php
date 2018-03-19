<?php global $id_ahihi; ?>
<div class="category-box <?php if(!($id_ahihi)){ ?>sidebar-product<?php } ?>">
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
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?><?php endif; ?>