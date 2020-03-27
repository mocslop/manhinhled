<?php 
function shortcode_featured_product(){
	ob_start();
	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => 'featured',
		'operator' => 'IN',
	);
	?>
	<?php $args = array( 
		'post_type' => 'product',
		'posts_per_page' => 10,
		'ignore_sticky_posts' => 1, 
		'tax_query' => $tax_query
	); 
		?>
		<?php 
		$getposts = new WP_query( $args);
		global $wp_query; $wp_query->in_the_loop = true; 
		?>
		<ul class="row">
			<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<?php global $product; ?>
				<li class="col-sm-3">
					<div class="tg_product_inner">
						<div class="wrap_figure">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $getposts->post->ID ), 'single-post-thumbnail' );?>
							<figure class="thumbnail" style="background:url(<?php  echo $image[0]; ?>);" class="thumb_product" >
								<a href="<?php the_permalink();?>"></a>
							</figure>
						</div>

						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="price-product"><?php echo $product->get_price_html(); ?></div>
						<!-- <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ</a> -->
					</div>
				</li>	

			<?php endwhile; wp_reset_postdata(); ?>
		</ul>

		<?php
		return ob_get_clean();
	}
	add_shortcode('sc_ftproduct','shortcode_featured_product');



	function shortcode_our_product(){
		ob_start();
		?>
		<?php
		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
						  $show_count   = 0;      // 1 for yes, 0 for no
						  $pad_counts   = 0;      // 1 for yes, 0 for no
						  $hierarchical = 0;      // 1 for yes, 0 for no  
						  $title        = '';  
						  $empty        = 0;
						  $args = array(
						  	'taxonomy'     => $taxonomy,
						  	'orderby'      => $orderby,
						  	'show_count'   => $show_count,
						  	'pad_counts'   => $pad_counts,
						  	'hierarchical' => $hierarchical,
						  	'title_li'     => $title,
						  	'hide_empty'   => $empty,
						  );
						  $all_categories = get_categories( $args );
						  ?>
						  <ul class="row">
						  	<?php foreach ($all_categories as $cat) { ?>
						  		<?php   	
						  		if($cat->category_parent == 0 && $cat->category_count>0) {
						  			$category_id = $cat->term_id;     
						  			$hide_cat = get_term_meta($cat->term_id, 'wh_meta_desc', true);
						  			if($hide_cat == false){      
						  				?>
						  				<li class="col-sm-3">
						  					<div class="tg_product_inner">
						  						<div class="wrap_figure">
						  							<?php $thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
						  							$image = wp_get_attachment_url( $thumbnail_id );
						  							?>
						  							<figure class="thumbnail" style="background:url(<?php echo $image; ?>);" >
						  								<a href="<?php echo get_category_link($category_id) ?>"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"></a>
						  							</figure>
						  							<!-- $cat->count -->
						  						</div>
						  						<h4><?php echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';?></h4>
						  						<!-- $cat->count -->
						  					</div>
						  				</li>
						  				<?php 
						  		} // endif hidecat
						  		} //endif
						  	}//end foreach ?>
						  </ul>
						  <?php
						  return ob_get_clean();
						}
add_shortcode('sc_ourproduct','shortcode_our_product');
