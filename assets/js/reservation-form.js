const oneDayPrice = 1000;
const adultBreakfastPrice = 200;
const kidBreakfastPrice = 150;
const cleaningPrice = 400;

function toggleAdditionalOptions() {
  var additionalOptions = document.getElementById('additional-options');
  additionalOptions.style.display = (
    additionalOptions.style.display === 'none'
    || additionalOptions.style.display === ''
  ) ? 'grid' : 'none';
}

function openSection2() {
  if (checkSection1Validation()) {
    const section1 = document.getElementById('form-section-1');
    const section2 = document.getElementById('form-section-2');

    section1.style.display = 'none';
    section2.style.display = 'grid';
  } else {
    const reservationForm = document.getElementById('reservation-form');

    reservationForm.reportValidity();
  }
}

function checkSection1Validation() {
  const startDate = document.getElementById('start-date');
  const endDate = document.getElementById('end-date');
  const adults = document.getElementById('adults');
  const kids = document.getElementById('kids');

  return startDate.checkValidity() && endDate.checkValidity()
    && adults.checkValidity() && kids.checkValidity();
}

function openSection1() {
  const section1 = document.getElementById('form-section-1');
  const section2 = document.getElementById('form-section-2');

  section1.style.display = 'grid';
  section2.style.display = 'none';
}

function openFormResult() {
  const formResult = document.getElementById('form-result');
  
  formResult.style.display = 'flex';
}


function closeFormResult() {
  const formResult = document.getElementById('form-result');
  
  formResult.style.display = 'none';
}

function confirmFormResult() {
  const formResult = document.getElementById('form-result');
  
  fetch('./reserve.php', {
    method: 'POST',
    body: data
  })
  .then(() => {
    reservationForm.reset();
    price.textContent = '0UAH';
    openSection1();
  });

  formResult.style.display = 'none';
}

const reservationForm = document.getElementById('reservation-form');
reservationForm.addEventListener('submit', (event) => {
  reservationForm.preventDefault();

  if (reservationForm.checkValidity()) {
    openFormResult();

    data = new FormData(reservationForm);

    formResult.innerHTML = getInfo();
  }
});


const rooms = document.getElementById('rooms');
const adults = document.getElementById('adults');
const kids = document.getElementById('kids');
const breakfast = document.getElementById('breakfast');
const cleaning = document.getElementById('cleaning');
const price = document.getElementById('price');
const clientName = document.getElementById('name');
const patronymic = document.getElementById('patronymic');
const surname = document.getElementById('surname');
const phone = document.getElementById('phone');
const email = document.getElementById('email');

const formResult = document.getElementById('form-result-content');

function updatePrice() {
  const startDate = new Date(document.getElementById('start-date').value);
  const endDate = new Date(document.getElementById('end-date').value);
  const selectedRoomOption = roomSelect.options[roomSelect.selectedIndex];
  const roomPrice = parseInt(selectedRoomOption.getAttribute('data-price')) || 0;

  const selectedPersonCount = parseInt(personSelect.value) || 0;
  const selectedChildCount = parseInt(childSelect.value) || 0;

  if (startDate && endDate && startDate <= endDate) {
    const daysDifference = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
    const basePrice = 1000; // Стоимость одного дня
    const totalPrice = (daysDifference * basePrice) + roomPrice;

    let breakfastPrice = 0;
    if (option1Checkbox.checked) {
      const totalGuests = selectedPersonCount + selectedChildCount;
      breakfastPrice = 50 * totalGuests * daysDifference;
    }

    let option2Price = 0;
    if (option2Checkbox.checked) {
      option2Price = option2Price * daysDifference;
    }

    const finalTotalPrice = totalPrice + breakfastPrice + option2Price;

    priceElement.textContent = `Вартість: ${finalTotalPrice} грн`;
    breakfastPriceElement.textContent = `Вартість завтраків: ${breakfastPrice} грн`;
  } else {
    priceElement.textContent = 'Вартість: 0 грн';
    breakfastPriceElement.textContent = 'Вартість завтраків: 0 грн';
  }
}

const startDate = document.getElementById('start-date');
const endDate = document.getElementById('end-date');
const date = new Date().toISOString().split('T')[0];

startDate.setAttribute('min', date);
endDate.setAttribute('min', date);

startDate.addEventListener('change', () => {
  let minDate = new Date();
  minDate.setDate(new Date(startDate.value).getDate() + 1);
  endDate.setAttribute('min', minDate.toISOString().split('T')[0]);

  if (new Date(endDate.value) <= new Date(startDate.value)) {
    endDate.value = minDate.toISOString().split('T')[0];
  }

  calculatePrice();
});

endDate.addEventListener('change', () => {
  calculatePrice();
});

rooms.addEventListener('change', () => {
  calculatePrice();
});

adults.addEventListener('change', () => {
  calculatePrice();
});

kids.addEventListener('change', () => {
  calculatePrice();
});

breakfast.addEventListener('change', () => {
  calculatePrice();
});

cleaning.addEventListener('change', () => {
  calculatePrice();
});


function calculatePrice() {
  const days = Math.ceil((new Date(endDate.value) - new Date(startDate.value)) / (1000 * 60 * 60 * 24));

  if (!isNaN(days)) {
    const result = days * oneDayPrice * rooms.value
      + (breakfast.checked ? (adults.value * adultBreakfastPrice + kids.value * kidBreakfastPrice) * days : 0)
      + (cleaning.checked ? (cleaningPrice * days) : 0);

    price.textContent = result + 'UAH';

    return result;
  } else {
    return 0;
  }
}

function getInfo() {
  return `
    <div class="results__field">You succesfully reserve house!</div>
    <div class="results__field">${clientName.value} ${patronymic.value} ${surname.value}</div>
    <div class="results__field">Count of rooms: ${rooms.value}</div>
    <div class="results__field">Count of adults: ${adults.value}</div>
    <div class="results__field">Count of kids: ${kids.value}</div>
    <div class="results__field">${(breakfast.checked) ? "Breakfasts included" : "No breakfasts"}</div>
    <div class="results__field">${(cleaning.checked) ? "Cleanings included" : "No cleanings"}</div>
    <div class="results__field">Contact phone: ${phone.value}.value}!</div>
    <div class="results__field">Email: ${email.value}!</div>
  `;
}
