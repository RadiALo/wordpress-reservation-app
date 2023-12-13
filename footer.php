<footer class="footer">
  <div>
    <?php
    wp_reset_query();

    if (!is_index_page()) {
      echo '<a href="' . get_page_link(1) . 'class="footer__logo">';
    }
    ?>
    <img src=<?= get_logo_uri() ?> alt="logo" class="footer__img">
    <?php
    if (!is_index_page()) {
      echo '</a>';
    }
    ?>
  </div>

  <div>
    <?php
    wp_nav_menu(
      array(
        'menu' => 'footer',
        'menu_class' => 'nav__list',
        'container' => '',
        'theme_location' => 'footer'
      )
    );
    ?>
  </div>

  <div class="contacts__links">
    <a href="https://facebook.com">
      <img src=<?= get_template_directory_uri() . "/assets/img/facebook.svg" ?> alt="" class="contacts__icon">
    </a>

    <a href="https://instagram.com" class="contacts__link">
      <img src=<?= get_template_directory_uri() . "/assets/img/instagram.svg" ?> alt="" class="contacts__icon">
    </a>

    <a href="https://web.telegram.org" class="contacts__link">
      <img src=<?= get_template_directory_uri() . "/assets/img/telegram.svg" ?> alt="" class="contacts__icon">
    </a>

    <a href="https://youtube.com" class="contacts__link">
      <img src=<?= get_template_directory_uri() . "/assets/img/youtube.svg" ?> alt="" class="contacts__icon">
    </a>
  </div>

  <div>
    <a href="tel: +380000000000" class="footer__phone">+38 (000) 000-00-00</a>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>