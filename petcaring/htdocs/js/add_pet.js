/*
* JavaScript file for the add pet page (i.e. 'Add a pet' page).
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

// Inititalise select element for 'type_of_pet' and 'size'
$(document).ready(function() {
  $('select').material_select();
});
