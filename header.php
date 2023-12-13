<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StaySpot - Your House Reservation App</title>
  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <div>
      <?php
        if (!is_index_page()) {
          echo '<a href=' . get_page_link(1) . ' class="header__logo">';
        }
      ?>      
        <img src=<?= get_logo_uri() ?> alt="logo" class="header__img">
      <?php 
      if (!is_index_page()) {
        echo '</a>';
      }
      ?>
    </div>

    <div class="header__nav">
      <nav class="nav">
        <?php 
            wp_nav_menu(
              array(
                'menu' => 'header',
                'menu_class' => 'nav__list',
                'container' => '',
                'theme_location' => 'header'
              )
            );
        ?>
      </nav>
    </div>
  </header>