  <?php 
/*
Template Name: page-template-duan
*/
get_header(); 
?>	

<div class="page-wrapper">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<div class="menu_product_sidebar col-sm-3">
					<?php  get_template_part('includes/frontend/sidebar/menu_sidebar'); ?>
				</div>
				<div class="col-sm-9 list_pd_archive">
					<?php woocommerce_breadcrumb(); ?>
					<ul class="products">
						<?php

		
						$args = array( 
							'post_type' => 'product',
							'posts_per_page' => 6, 
							'orderby' => 'rand' ,
							'tax_query'             => array(
								array(
									'taxonomy'      => 'product_cat',
            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
            'terms'         => 66,
            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
        ),
							)
						);
						$products = new WP_Query( $args );
						while ( $products->have_posts() ) : $products->the_post(); global $product; ?>

							<li class="col-sm-4">
											<div class="tg_product_inner">
												<div class="wrap_figure">
													<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ), 'single-post-thumbnail' );?>
													<figure class="thumbnail" style="background:url(<?php  echo $image[0]; ?>);" class="thumb_product" >
														<a href="<?php the_permalink();?>"></a>
													</figure>
												</div>

												<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												<!-- <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ</a> -->
											</div>
										</li>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</ul><!--/.products-->
				</div>
			</div>
		</div> <!-- container -->
	</div>
</div>
<?php get_footer(); ?>