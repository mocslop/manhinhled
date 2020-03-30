<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	
		
<div class="g_content">
	<div class="container">
		<div class="row">
			<div class="menu_product_sidebar col-sm-3">
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
						  <h3>DANH MỤC SẢN PHẨM</h3>
						  <ul>
						  	<?php foreach ($all_categories as $cat) { ?>
						  		<?php   	
						  		//var_dump($cat);  
						  		if($cat->category_parent == 0 && $cat->category_count>0) {
						  			$category_id = $cat->term_id;     
						  			$hide_cat = get_term_meta($cat->term_id, 'wh_meta_desc', true);
						  			if($hide_cat == false){
						  				?>
						  				<li id="<?php echo $cat->term_id; ?>">
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
						  				</li>
						  				<?php 
						  			}
						  		} //endif
						  	}//end foreach ?>
						  </ul>
						</div>
						<div class="col-sm-9">
							<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>


                </div>
            </div>
        </div> <!-- container -->
    </div>
	
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
