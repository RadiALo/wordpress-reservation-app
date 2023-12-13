<?php
/*
    Template name: Single house page
*/
?>
<?php get_header(); ?>
<div class="single-house-container">
<div class="house-card">
  <img
    class="house-card__image"
    src="<?= get_field('image', get_the_ID()) ?>"
    alt="House 1"
  >

  <div class="house-card__fields">
    <div class="house-card__field">
      <img 
        class="house-card__icon" 
        src= <?= get_template_directory_uri() . "/assets/img/room.png" ?>
        alt="rooms"
      >
      Rooms: 
      <?= get_field('rooms', get_the_ID()) ?>
    </div>

    <div class="house-card__field">
      <img 
        class="house-card__icon" 
        src= <?= get_template_directory_uri() ."/assets/img/adult.png" ?>
        alt="adult"
      >
      Adults: 
      <?= get_field('adults', get_the_ID()) ?>
    </div>

    <div class="house-card__field">
      <img 
        class="house-card__icon" 
        src= <?= get_template_directory_uri() ."/assets/img/kid.png" ?>
        alt="kids"
      >
      Kids: 
      <?= get_field('kids', get_the_ID()) ?>
    </div>
    <div class="house-card__field">
      <img class="house-card__icon" src=<?= get_template_directory_uri() . "/assets/img/" . wifi_image(has_the_wifi()) ?> alt="wifi">
      <?php 
        if (has_the_wifi()) {
          echo "Has Wi-Fi";
        } else {
          echo "No Wi-Fi";
        }
      ?>      
    </div>
    <div class="house-card__field">
      <img class="house-card__icon" src=<?= get_template_directory_uri() . "/assets/img/money.png" ?> alt="kids">
      Price:
      <?= get_field('price', get_the_ID()) ?>
    </div>
  </div>
</div>

<section id="contacts" class="section">
  <h3 class="section-title"><?= get_the_title() ?></h3>

  <div class="section-content">
    <?= get_the_content() ?>
  </div>
</section>
</div>
<?php get_footer(); ?>