<?php
/*
    Template name: Index page
*/
?>
<?php get_header(); ?>
<div class="slider">
  <div class="slider__slide-container">
    <?php
    $the_slides_query = new WP_Query(
      array(
        'post_type' => 'slider'
      )
    );

    while ($the_slides_query->have_posts()) {
      $the_slides_query->the_post();
      echo '<img class="slider__slide" src="' . get_field('desktop', get_the_ID()) . '">';
    }
    ?>
  </div>
</div>

<section id="reserve">
  <div class="reservation-form">
    <h2 class="reservation-form__title">Make a Reservation</h2>
    <form id="reservation-form" class="reservation-form__form">
      <div id="form-section-1" class="reservation-form__section">
        <div class="reservation-form__field">
          <label for="start-date" class="reservation-form__label">Start Date</label>
          <input type="date" id="start-date" name="start-date" class="reservation-form__input" required>
        </div>

        <div class="reservation-form__field">
          <label for="end-date" class="reservation-form__label">End Date</label>
          <input type="date" id="end-date" name="end-date" class="reservation-form__input" required>
        </div>

        <div class="reservation-form__field">
          <label for="rooms" class="reservation-form__label">Number of Rooms</label>
          <input type="number" id="rooms" name="rooms" class="reservation-form__input" value="1" min="1" required>
        </div>

        <div class="reservation-form__field">
          <label for="adults" class="reservation-form__label">Number of Adults</label>
          <input type="number" id="adults" name="adults" class="reservation-form__input" value="1" min="1" required>
        </div>


        <div class="reservation-form__field">
          <label for="kids" class="reservation-form__label">Number of Kids</label>
          <input type="number" id="kids" name="kids" class="reservation-form__input" value="0" min="0" required>
        </div>

        <button type="button" id="additional-options-btn" class="reservation-form__button"
          onclick="toggleAdditionalOptions()">
          Additional Options
        </button>

        <div id="additional-options" class="reservation-form__options" style="display: none;">
          <label class="reservation-form__checkbox-label"><input type="checkbox" id="breakfast" name="breakfast"
              class="reservation-form__checkbox"> Breakfast</label>
          <label class="reservation-form__checkbox-label"><input type="checkbox" id="cleaning" name="cleaning"
              class="reservation-form__checkbox"> Cleaning</label>
        </div>

        <button id="additional-fields-btn" type="button" onclick="openSection2()" class="reservation-form__button">
          Continue Reservation
        </button>
      </div>

      <div id="form-section-2" class="reservation-form__section" style="display: none;">

        <div class="reservation-form__field">
          <label for="name" class="reservation-form__label">
            Name
          </label>

          <input type="text" id="name" name="name" class="reservation-form__input" required>
        </div>


        <div class="reservation-form__field">
          <label for="patronymic" class="reservation-form__label">
            Patronymic
          </label>

          <input type="text" id="patronymic" name="patronymic" class="reservation-form__input" required>
        </div>

        <div class="reservation-form__field">
          <label for="surname" class="reservation-form__label">
            Surname
          </label>

          <input type="text" id="surname" name="surname" class="reservation-form__input" required>
        </div>

        <div class="reservation-form__field">
          <label for="phone" class="reservation-form__label">
            Phone
          </label>

          <input type="tel" id="phone" name="phone" class="reservation-form__input" pattern="[0-9]{10}" required>
        </div>

        <div class="reservation-form__field">
          <label for="email" class="reservation-form__label">
            Email
          </label>

          <input type="email" id="email" name="email" class="reservation-form__input" required>
        </div>

        <input type="submit" value="Submit Reservation" class="reservation-form__button">

        <button id="additional-fields-btn" type="button" onclick="openSection1()" class="reservation-form__button">
          Back
        </button>
      </div>

      <div id="price" class="reservation-form__price">
        0UAH
      </div>
    </form>
  </div>
</section>

<section>
  <div class="house-cards">
    <?php
      $the_houses_query = new WP_Query(
        array(
          'post_type' => 'house',
          'posts_per_page' => 4
        )
      );

      while ($the_houses_query->have_posts()) {
        $the_houses_query->the_post();
        get_template_part('template-parts/house', 'card');
      }
    ?>
  </div>
</section>

<section class="section">
  <h2 class="section-title">About us</h2>
  <div class="section-content">
    Welcome to StaySpot reservation service, where comfort meets convenience in the world of accommodation.
    Immerse yourself in the seamless experience of securing your ideal home away from home with our user-friendly platform.
  </div>
  <div class="section-content">
  Discover a vast array of meticulously curated properties, ranging from cozy apartments to luxurious villas, all handpicked to cater to your unique preferences and travel requirements.
  Our intuitive interface empowers you to effortlessly browse through an extensive selection of accommodations,
  each accompanied by detailed descriptions, high-quality images, and user reviews to ensure transparency
  and informed decision-making.
  </div>
  <div class="section-content">
  At the heart of our service is a commitment to providing you with the utmost flexibility.
  Whether you're planning a spontaneous weekend getaway or organizing a well-orchestrated family vacation,
  our platform allows you to easily filter and refine your search based on location, amenities, budget, and more.
  </div>
  <div class="section-content">
  Secure your reservation with confidence, knowing that our platform prioritizes secure payment methods
  and adheres to industry-leading privacy standards. We prioritize the safety and satisfaction of our users,
  ensuring that your booking experience is not only seamless but also secure.
  </div>
  <div class="section-content">
  In addition to our robust reservation system, we offer a dedicated customer support team ready to assist you at every step of your journey.
  From inquiries about specific properties to last-minute adjustments, our team is committed to providing responsive
  and personalized assistance to enhance your overall experience.
  </div>
  <div class="section-content">
  Experience the epitome of stress-free travel planning with our house reservation service.
  Whether you're embarking on a solo adventure, a romantic getaway, or a group expedition,
  we're here to transform your accommodation selection process into a delightful and memorable part of your travel experience.
  Book with confidence, and let us be your trusted companion in crafting unforgettable travel memories.
  </div>
</section>

<section class="section">
  <h2 class="section-title">Reviews</h2>
  <div class="reviews__slick">
    <?php
      $the_reviews_query = new WP_Query(
        array(
          'post_type' => 'reviews',
          'posts_per_page' => 5,
          'sortby' => 'date'
        )
      );

      while ($the_reviews_query->have_posts()) {
        $the_reviews_query->the_post();
        get_template_part('template-parts/review', 'card');
      }
    ?>
  </div>
</section>

<div id="form-result" class="reservation-result" style="display: none;">
  <div class="reservation-result__container">
    <div id="form-result-content" class="reservation-result__content">
      There will be reservation results!
    </div>

    <button id="additional-fields-btn" type="button" onclick="closeFormResult()" class="reservation-result__button">
      Back
    </button>

    <button id="additional-fields-btn" type="button" onclick="confirmFormResult()" class="reservation-result__button">
      Confirm
    </button>
  </div>
</div>

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