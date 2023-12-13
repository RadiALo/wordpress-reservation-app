<?php
/*
    Template name: Reviews page
*/
?>
<?php get_header(); ?>
<section id="reviews" class="section">
  <h2 class="section-title">Reviews</h2>
  <?php
  $the_reviews_query = new WP_Query(
    array(
      'post_type' => 'reviews'
    )
  );

  while ($the_reviews_query->have_posts()) {
    $the_reviews_query->the_post();
    get_template_part('template-parts/review', 'card');
  }
  ?>
</section>
<?php get_footer(); ?>