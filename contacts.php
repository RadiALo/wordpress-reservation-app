<?php
/*
    Template name: Contacts page
*/
?>
<?php get_header(); ?>
<section  class="section">
  <h2 class="section-title">Contact Us</h2>
  <div>
    <a href="tel: +380000000000" class="contacts__phone">+38 (000) 000-00-00</a>
  </div>

  <div class="contacts__map">
    Found us:
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d87312.73210452773!2d-122.4194!3d37.7749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swooden!5e0!3m2!1sru!2sua!4v1696863889449!5m2!1sru!2sua"
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
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
</section>
<?php get_footer(); ?>