/*
* JavaScript file for the search page (i.e. 'Find caretaker' page).
*/

// DatePicker
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 1, // Creates a dropdown of 1 year to control year
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date
});

// Inititalise select element for 'type_of_pet'
$(document).ready(function() {
    $('select').material_select();
});
