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
const showInputField = (fieldname) => {
   let field = document.querySelector(`#${fieldname}-input`);
   field.style.display = 'flex';
};

window.onload = () => {
   hideAll();

   let selectCondition = document.querySelector("select[name='condition']");
   selectCondition.onchange = () => {
      let condition = selectCondition.value;
      hideAll();
      showInputField(condition);
   };

};

})();