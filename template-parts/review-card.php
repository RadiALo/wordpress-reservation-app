<div class="reviews_container">
  <?php
    $custom = get_post_custom();
  ?>
  
  <div class="reviews__user">
    <img class="reviews__icon" src=<?= get_template_directory_uri() . "/assets/img/adult.png" ?> alt="">
    <span class="reviews__date"><?= get_the_date() ?></span>
    <?= get_field('username', get_the_ID()) ?>
  </div>
  <div class="reviews__text">
    <?= get_the_content() ?>
  </div>
  <div class="reviews__rate">
    <?= get_field('rate', get_the_ID()) ?>/5
  </div>
</div>