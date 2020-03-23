<?php 
get_header(); 
?>	

<div id="wrap">
	<div class="g_content <?php if(in_category(16)){ echo 'title_hv'; } ?>"> 
		<div class="container">
			<div class="row">
				<?php 
				if(have_posts()) :
					while(have_posts()) : the_post(); ?>
						<div class=" col-sm-12  content_left">
							<article class="content_single_post">
								<div class="single_post_info">
									<h2><?php the_title(); ?></h2>
								</p>
							</div>
							<div class="post_avt">
								<div class="wrap_post_avt">
									<?php //the_post_thumbnail();?>
								</div>
							</div>
							<div class="text_content">
								<?php  the_content(); ?>
							</div>
						</article>

						<!-- fb-comment-area -->
						<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-order-by="reverse_time" data-width="855" data-numposts="20" data-colorscheme="light" ></div>

						<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) ); ?>
						<?php if($related){ ?>
							<div class="related_posts">
								<h2>Bài viết khác</h2>
								<ul class="row"> 
									<?php
									if( $related ) foreach( $related as $post ) {
										setup_postdata($post); ?>

										<li class="col-sm-3">
											<div class="list_item_related pw">
												<figure class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
												<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
											</div>

										</li>

									<?php }
									wp_reset_postdata(); ?>
								</ul>   
							</div>
						<?php } ?> 
					</div>
				<?php endwhile;
			else:
			endif;
			wp_reset_postdata();
			?>
		</div>

	</div>

</div>
</div>


<?php get_footer(); ?>


