/*
* JavaScript file for the edit pet page (i.e. 'Edit pet' page).
*/
// DatePicker
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 5, // Creates a dropdown of 5 years to control year
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: false // Close upon selecting a date
});

// Inititalise select element for 'type_of_pet'
$(document).ready(function() {
  $('select').material_select();
});
