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
    createNewCards
  );

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function () {
    // Reenable the inputs
    $inputs.prop("disabled", false);
  });
});

// Creates a new list of person cards according to the search results
function createNewCards(response) {
  document.getElementById("card-container").innerHTML = "";
  if (response === "ERROR!") {
      var errorNode = createNewTextNode(
        "ERROR! Please check your inputs. Did you leave a field blank?");
      document.getElementById("card-container").appendChild(errorNode);
      return;
  }

  var result = JSON.parse(response);
  console.log("response: " + result);

  var noOfCards = result.length;
  // If there are no results, state so
  if (noOfCards == 0) {
    var childNode = createNewTextNode("There are no results for this search!");
    document.getElementById("card-container").appendChild(childNode);
  } else {
    for (var i = 0; i < noOfCards; i++) {
        var currentDetails = result[i];
        var currentCard = createNewCard(currentDetails);
        document.getElementById("card-container").appendChild(currentCard);
    }
  }
}

// Creates a single person card according to the given details
function createNewCard(data) {
  var name = data[0];
  var region = data[1];
  var address = data[2];
  var minBid = data[3];
  var remark = data[4];

  var horizontalCard = createNewDivWithClass("card horizontal hoverable");

 // Card image
  var cardImage = createNewDivWithClass("card-image");
  var actualImage = document.createElement("img");
  actualImage.src = "img/penguin.png";
  actualImage.className = "circle";
  cardImage.appendChild(actualImage);
  horizontalCard.appendChild(cardImage);

  // Card content
  var cardStacked = createNewDivWithClass("card-stacked row");
  var cardContent = createNewDivWithClass("card-content");
  // Left column display of the card
  var cardLeftCol = createNewDivWithClass("col s6");
  var nameNode = createNewTextNode("Name: " + name);
  var regionNode = createNewTextNode("Region: " + region);
  var addressNode = createNewTextNode("Address: " + address);
  var remarkNode = createNewTextNode("Remark: " + remark);
  cardLeftCol.appendChild(nameNode);
  cardLeftCol.appendChild(regionNode);
  cardLeftCol.appendChild(addressNode);
  cardLeftCol.appendChild(remarkNode);
  // Right column display of the card
  var cardRightCol = createNewDivWithClass("col s6");
  var bidNode = createNewTextNode("Minimum bid required: $" + minBid);
  var yourBid = createNewTextNode("Your bid: $");
  cardRightCol.appendChild(bidNode);
  cardRightCol.appendChild(yourBid);
  cardContent.appendChild(cardLeftCol);
  cardContent.appendChild(cardRightCol);
  cardStacked.appendChild(cardContent);
  horizontalCard.appendChild(cardStacked);

  return horizontalCard;
}

// Creates a new div with the given class
function createNewDivWithClass(className) {
    var node = document.createElement("div");
    node.className = className;
    return node;
}

// Creates a new text node with the given content
function createNewTextNode(content) {
  var node = document.createElement("p");
  var textNode = document.createTextNode(content);
  node.appendChild(textNode);
  return node;
}
