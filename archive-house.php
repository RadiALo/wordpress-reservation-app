<?php
/*
    Template name: Houses page
*/
?>
<?php get_header(); ?>
<h2 class="section-title">Houses</h2>

<div class="house-cards wrap no-margin">
  <?php
  $the_houses_query = new WP_Query(
    array(
      'post_type' => 'house'
    )
  );

  while ($the_houses_query->have_posts()) {
    $the_houses_query->the_post();
    get_template_part('template-parts/house', 'card');
  }
  ?>
</div>
<?php get_footer(); ?>