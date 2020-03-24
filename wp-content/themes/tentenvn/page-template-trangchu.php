
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div class="page-wrapper">

	<div class="g_content">
		
		<div class="content_left">

		<div class="product_area_index">
			<div class="container">
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
						  <div class="loop_post_category_idx">
						  	<?php foreach ($all_categories as $cat) { ?>
						  		<?php   	
						  		//var_dump($cat);  
						  		if($cat->category_parent == 0 && $cat->category_count>0) {
						  			$category_id = $cat->term_id;     
						  			$hide_cat = get_term_meta($cat->term_id, 'wh_meta_desc', true);
						  			if($hide_cat == false){
						  				?>
						  				<div class="item_loop_post_category_idx" id="<?php echo $cat->term_id; ?>">
						  					<div class="top_menu_list_product">
						  						<div class="parent_catgories_idx">
						  							<?php echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';?>
						  							<!-- $cat->count -->
						  						</div>
						  						<?php
						  						$args2 = array(
						  							'taxonomy'     => $taxonomy,
						  							'child_of'     => 0,
						  							'parent'       => $category_id,
						  							'orderby'      => $orderby,
						  							'show_count'   => $show_count,
						  							'pad_counts'   => $pad_counts,
						  							'hierarchical' => $hierarchical,
						  							'title_li'     => $title,
						  							'hide_empty'   => $empty
						  						);
						  						$sub_cats = get_categories( $args2 );
						  						if($sub_cats) {
						  							?>
						  							<ul class="sub_product_category">
						  								<?php

						  								foreach($sub_cats as $sub_category) {
						  									$hide_cat_sub = get_term_meta($sub_category->term_id, 'wh_meta_desc', true);
						  								//var_dump($sub_category);
						  									if($hide_cat_sub == false && $sub_category->count){
						  										echo  '<li id="'.$sub_category->term_id .'"><a href="'.get_term_link($sub_category->slug, 'product_cat')  .'">'.$sub_category->name.' </a></li>' ;
						  									}
						  								}?>
						  							</ul>
						  							<?php   
						  						}
						  						?>
						  					</div>
						  					<?php $thumbnail_id = get_woocommerce_term_meta( $category_id, 'thumbnail_id', true );
						  						  if($thumbnail_id){
						  					?>
						  					<div class="banner_category">
						  						<?php $thumbnail_id = get_woocommerce_term_meta( $category_id, 'thumbnail_id', true );
						  						$image = wp_get_attachment_url( $thumbnail_id );
						  						?>
						  						<figure class="thumbnail" style="background:url(<?php echo $image; ?>);" >
						  							<a href="<?php echo get_category_link($category_id) ?>"></a>
						  						</figure>
						  						<!-- $cat->count -->
						  					</div>
						  				   <?php }?>
						  					<?php 
						  					$args_list_product_category = array(
						  						'posts_per_page' => 8,
						  						'tax_query' => array(
						  							array(
						  								'taxonomy' => 'product_cat',
						  								'field' => 'slug',
						  								'terms' => $cat->slug
						  							)
						  						),
						  						'post_type' => 'product',
						  						'orderby' => 'title,'
						  					);
						  					$products = new WP_Query( $args_list_product_category );
						  					?>
						  					<ul class="list_product_category row">

						  						<?php 
						  						while ( $products->have_posts() ) { $products->the_post();global $product;
						  							?>
						  							<li class="list_item_product col-sm-3">
						  								<div class="product_inner">
						  									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ), 'single-post-thumbnail' );?>
						  									<figure class="thumbnail" style="background:url(<?php  echo $image[0]; ?>);" class="thumb_product" >
						  										<a href="<?php echo get_permalink( $loop->post->ID ) ?>"><img src="<?php echo $image[0]; ?>"></a>
						  										<a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="detail_pd"></a>
						  										<div class="tg_btn_acts">
						  											<ul>
						  												<li class="add_c"><?php woocommerce_template_loop_add_to_cart( $products->post, $product ); ?></li>
						  											</ul>
						  										</div>
						  									</figure>

						  									<div class="product_meta">
						  										<h3><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?></a></h3>

						  										<div class="price">
						  											<span>
						  												<?php echo $product->get_price_html(); ?>
						  											</span>      
						  										</div>	
						  									</div>

						  								</div>

						  							</li>
						  							<?php
						  						}
						  						?>
						  					</ul>

						  				</div>
						  				<?php 
						  			}
						  		} //endif
						  	}//end foreach ?>
						  </div>


						</div>

					</div>
				</div><!-- content_left -->

			</div>

		</div>

		<?php get_footer(); ?>




