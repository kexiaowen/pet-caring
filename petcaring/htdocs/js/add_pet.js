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

// Bind submit event of form -- this code snippet is inspired by
// https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
var request;
var serializedData;

$("#add_pet").submit(function(event) {
  // Prevent default posting of form
  event.preventDefault();

  // Abort any pending request
  if (request) {
    request.abort();
  }

  $form = $(this);
  $inputs = $form.find("input, select");

  // Serialize data in the form
  serializedData = $form.serialize() + '&owner=' + owner;
  console.log("data: " + serializedData);

  // Disable the inputs for the duration of the Ajax request.
  // Note: we disable elements AFTER the form data has been serialized.
  // Disabled form elements will not be serialized.
  $inputs.prop("disabled", true);

  // Fire off the request to php/search.php
  request = $.post (
    "php/add_pet.php",
    serializedData,
    indicateAddPetSuccess
  );

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function () {
    // Reenable the inputs
    $inputs.prop("disabled", false);
  });
});

function indicateAddPetSuccess(response) {
    console.log("response: " + response);
    if (response === "SUCCESS!") {
      Materialize.toast('Pet added successfully!', 2500, 'green lighten-1 rounded');
      return ;
    }

    if (response === "ERROR!") {
      Materialize.toast('Check your submission!', 2500, 'red darken-1 rounded');
      return ;
    }

    if (response === "Pet already exists!") {
      Materialize.toast('You have already added this pet!', 2500, 'red darken-1 rounded');
      return ;
    }
}
