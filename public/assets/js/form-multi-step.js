const forms = document.querySelectorAll(".c-form__box");
const nextButton = document.querySelector(".js-next");
const previousButton = document.querySelector(".js-previous");
const submitButton = document.querySelector(".js-submit");
const progress = document.querySelectorAll(".c-form__progress");

let iteration = 0;

nextButton.addEventListener("click", function (e) {
  e.preventDefault();
  progress[iteration + 1].classList.add("c-progress-active");
  formControl();
});

previousButton.addEventListener("click", function () {
  if (iteration === forms.length) {
    iteration--;
    nextButton.classList.remove("hidden");
    submitButton.classList.add("hidden");
  }
  if (iteration > 0) {
    forms[iteration].classList.remove("active");
    forms[iteration - 1].classList.add("active");
    iteration--;
    previousForm();
  }

  progress[iteration + 1].classList.remove("c-progress-active");
});

function formControl() {
  if (iteration < forms.length) {
    nextForm();
  }

  previousForm();

  if (iteration === forms.length - 1) {
    nextButton.classList.add("hidden");
    submitButton.classList.remove("hidden");

    iteration++;
    return;
  }
}

function nextForm() {
  iteration++;
  forms[iteration - 1].classList.remove("active");
  forms[iteration].classList.add("active");
  console.log(iteration);
}

function previousForm() {
  if (iteration > 0) {
    previousButton.classList.contains("hidden") &&
      previousButton.classList.remove("hidden");
  } else {
    previousButton.classList.add("hidden");
  }
}
