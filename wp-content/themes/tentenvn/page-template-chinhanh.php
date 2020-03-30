<?php 
/*
Template Name: page-template-chinhanh
*/
get_header(); 
?>	

<div class="page-wrapper">
	<div class="g_content">
		<div class="title_hvred">
			<div class="container">
				<h3 class="widget-title">Chi nhánh</h3>
			</div>
</div>
		<?php
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
			<div class="entry-content-page">
				<?php the_content(); ?> 
			</div>
			<?php
		endwhile; 
    wp_reset_query(); //resetting the page query
    ?>
</div>
</div>
<?php get_footer(); ?>