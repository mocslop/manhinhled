

<footer class="footer">
  <div class="top_footer">
    <div class="container">
      <?php
      $args = array(
        'post_type' => 'page',
          'post__in' => array(245) //list of page_ids
        );
      $page_query = new WP_Query( $args );
      if( $page_query->have_posts() ) :
        //print any general title or any header here//
        while( $page_query->have_posts() ) : $page_query->the_post();
          echo '<div class="page-on-page" id="page_id-' . $post->ID . '">';
          echo the_content();
          echo '</div>';
        endwhile;
      else:
        //optional text here is no pages found//
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
       <p>Copyright © 2018 VIEN THONG TOAN TRUNG . All rights reserved.</p>
    </div>
  </div>
</footer>
<div class="scrolltop">
  <i class="fa fa-angle-up" aria-hidden="true"></i> 
</div>
<?php wp_footer(); ?>

<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>

</body>
</html>