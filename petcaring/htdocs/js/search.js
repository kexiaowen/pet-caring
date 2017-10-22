/*
* JavaScript file for the search page (i.e. 'Find caretaker' page).
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

// Inititalise select element for 'type_of_pet'
$(document).ready(function() {
  $('select').material_select();
});

// Bind submit event of form -- this code snippet is inspired by
// https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
var request;

$("#search").submit(function(event) {

  // Prevent default posting of form
  event.preventDefault();

  // Abort any pending request
  if (request) {
    request.abort();
  }

  $form = $("this");
  $inputs = $form.find("input, select");

  // Serialize data in the form
  var serializedData = $("form").serialize();

  // Disable the inputs for the duration of the Ajax request.
  // Note: we disable elements AFTER the form data has been serialized.
  // Disabled form elements will not be serialized.
  $inputs.prop("disabled", true);

  // Fire off the request to php/search.php
  request = $.post (
    "php/search.php",
    serializedData,
    dealWithReturnedData
  );

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function () {
    // Reenable the inputs
    $inputs.prop("disabled", false);
  });

});

function dealWithReturnedData(response) {
  console.log("response: " + JSON.parse(response));
}
