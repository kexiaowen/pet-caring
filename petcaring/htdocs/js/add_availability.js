/*
* JavaScript file for the add availability page.
*/
// DatePicker
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 3, // Creates a dropdown of 3 years to control year
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: false // Close upon selecting a date
});

// Inititalise select element for 'start_date' and 'end_date'
$(document).ready(function() {
  $('select').material_select();
});

// Bind submit event of form -- this code snippet is inspired by
// https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
var request;
var serializedData;

$("#add_availability").submit(function(event) {
  // Prevent default posting of form
  event.preventDefault();

  // Abort any pending request
  if (request) {
    request.abort();
  }

  $form = $(this);
  $inputs = $form.find("input, select");

  // Serialize data in the form
  serializedData = $form.serialize() + '&caretaker=' + caretaker;
  console.log("data: " + serializedData);

  // Disable the inputs for the duration of the Ajax request.
  // Note: we disable elements AFTER the form data has been serialized.
  // Disabled form elements will not be serialized.
  $inputs.prop("disabled", true);

  // Fire off the request to php/search.php
  request = $.post (
    "php/add_availability.php",
    serializedData,
    indicateAddAvailSuccess
  );

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function () {
    // Reenable the inputs
    $inputs.prop("disabled", false);
  });
});

function indicateAddAvailSuccess(response) {
    console.log("response: " + response);
    if (response === "SUCCESS!") {
      Materialize.toast('Availability added!', 2500, 'green lighten-1 rounded');
      return ;
    }

    if (response === "ERROR!") {
      Materialize.toast('Check your submission!', 2500, 'red darken-1 rounded');
      return ;
    }

    if (response === "Add failed.") {
      Materialize.toast('Availability already exists!', 2500, 'red darken-1 rounded');
      return ;
    }

    if (response === "Invalid dates.") {
      Materialize.toast('Check your dates!', 2500, 'red darken-1 rounded');
      return ;
    }
}
