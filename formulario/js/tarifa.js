
const submitBtn = document.getElementById("submitBtn");
const radioInputs = document.querySelectorAll("input[type='radio']");


radioInputs.forEach((input) => {

    if (input.checked && input.value === tarifa) {
        submitBtn.disabled = true;}

  input.addEventListener("change", () => {
    if (input.value === tarifa) {
      submitBtn.disabled = true;
    } else {
      submitBtn.disabled = false;
    }
  });
});


