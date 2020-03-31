<?php 
/*
Template Name: page-template-sanpham
*/
get_header(); 
?>	

<div class="page-wrapper">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<div class="menu_product_sidebar col-sm-3">
					<?php get_template_part('includes/frontend/sidebar/menu_sidebar'); ?>
				</div>
				<div class="col-sm-9 list_pd_archive">
					<?php echo do_shortcode('[sc_ourproduct]'); ?>
				</div>
			</div>
		</div> <!-- container -->
	</div>
</div>
<?php get_footer(); ?>