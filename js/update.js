// IIFE
(() => {

// Hide all input fields
const hideAll = () => {
   let inputFields = document.querySelectorAll('.inputfield');
   inputFields.forEach((item) => {
      item.style.display = 'none';
   });
};

// Display corresponding input field according to selected value
const toggleInputField = (fieldname) => {
   let field = document.querySelector(`#${fieldname}-input`);
   field.style.display == 'flex' ?
      field.style.display = 'none' :
      field.style.display = 'flex';
};

window.onload = () => {
   hideAll();

   let selectedFields = document.querySelectorAll(".form-check-input");
   selectedFields.forEach((checkbox) => {
      checkbox.onchange = () => {
         toggleInputField(checkbox.value);
      };
   });

};

})();