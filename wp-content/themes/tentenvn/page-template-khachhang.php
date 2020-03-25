<?php 
/*
Template Name: page-template-khachhang
*/
get_header(); 
?>	

<div class="page-wrapper">
	<div class="g_content">
		<div class="container">
			<h1 class="title_underred">Khách hàng</h1>
			<div class="g_content_left">
				<ul class="list_partner row">	
					<?php
					$args = array(  
						'post_type' => 'partners',
						'post_status' => 'publish',
						'posts_per_page' => 20, 
						'orderby' => 'title', 
						'order' => 'ASC'
					);

					$loop_partner = new WP_Query( $args ); 

					while ( $loop_partner->have_posts() ) : $loop_partner->the_post(); 
    	//echo the_title();
						$thumbnail = get_the_post_thumbnail_url($post->ID, 'image', true);
						?>		<li class="pw col-sm-6"> 
							<figure class="thumbnail">  <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>"> </figure> 
							<p><?php echo get_the_excerpt(); ?></p>
							</li> <?php
						endwhile;
						wp_reset_postdata(); 
						?>


					</ul>
				</div>
			</div><!-- container -->
		</div>
	</div>
	<?php get_footer(); ?>