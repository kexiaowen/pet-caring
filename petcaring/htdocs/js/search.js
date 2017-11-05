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
var serializedData;

$("#search").submit(function(event) {
  // Prevent default posting of form
  event.preventDefault();

  // Abort any pending request
  if (request) {
    request.abort();
  }

  $form = $(this);
  $inputs = $form.find("input, select");

  // Serialize data in the form
  serializedData = $form.serialize() + '&bidder=' + bidder;
  console.log("data: " + serializedData);

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

var result;

// Creates a new list of person cards according to the search results
function createNewCards(response) {
  console.log("response: " + response);
  document.getElementById("card-container").innerHTML = "";
  $(".bid-button").removeClass("disabled");

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

var cardCounter = 0;

// Creates a single person card according to the given details
function createNewCard(data) {
  var name = data[0];
  var caretaker = data[1];
  var region = data[2];
  var address = data[3];
  var startDate = data[4];
  var endDate = data[5];
  var minBid = data[6];
  var remark = data[7];

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
  var petNameAndBid = document.createElement("form");
  petNameAndBid.className = "card-form";
  petNameAndBid.setAttribute("id", "card" + cardCounter);
  var hiddenCaretaker = createNewInputWithClass("hidden", "", "caretaker");
  hiddenCaretaker.value = caretaker;
  var hiddenStartDate = createNewInputWithClass("hidden", "", "start_date");
  hiddenStartDate.value = startDate;
  var hiddenEndDate = createNewInputWithClass("hidden", "", "end_date");
  hiddenEndDate.value = endDate;
  var yourPetSection = createNewDivWithClass("col");
  var yourPet = createNewTextNode("Your pet: ");
  yourPet.className = "col s3";
  var petInput = createNewInputWithClass("text", "col s3 w3-border", "pet_name");
  yourPetSection.appendChild(yourPet);
  yourPetSection.appendChild(petInput);
  var yourBidSection = createNewDivWithClass("col");
  var yourBidStatement = createNewTextNode("Your bid: ");
  yourBidStatement.className = "col s3";
  var dollarSign = createNewIconWithClass("fa fa-dollar");
  var bidInput = createNewInputWithClass("text", "col s3 w3-border", "submitted_bid");
  yourBidStatement.appendChild(dollarSign);
  yourBidSection.appendChild(yourBidStatement);
  yourBidSection.appendChild(bidInput);
  petNameAndBid.appendChild(hiddenCaretaker);
  petNameAndBid.appendChild(hiddenStartDate);
  petNameAndBid.appendChild(hiddenEndDate);
  petNameAndBid.appendChild(yourPetSection);
  petNameAndBid.appendChild(yourBidSection);
  cardRightCol.appendChild(bidNode);
  cardRightCol.appendChild(petNameAndBid);

  // Creating the add bid button
  var bidButton = createNewDivWithClass("add-bid-btn");
  var innerButton = document.createElement("button");
  innerButton.className = "btn waves-effect waves-light light-blue lighten-2 bid-button";
  innerButton.setAttribute("type", "submit");
  innerButton.setAttribute("name", "add-bid");
  innerButton.setAttribute("form", "card" + cardCounter);
  innerButton.innerHTML = "Add bid";
  bidButton.appendChild(innerButton);

  // Creating whole card
  cardContent.appendChild(cardLeftCol);
  cardContent.appendChild(cardRightCol);
  cardContent.appendChild(bidButton);
  cardStacked.appendChild(cardContent);
  horizontalCard.appendChild(cardStacked);

  cardCounter++;

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

// Creates a new icon with the given class
function createNewIconWithClass(className) {
  var node = document.createElement("i");
  node.className = className;
  return node;
}

// Creates a new input field of given type with the given class
function createNewInputWithClass(type, className, name) {
  var node = document.createElement("input");
  node.className = className;
  node.setAttribute("type", type);
  node.setAttribute("name", name);
  return node;
}

var bidReq;

// Submit bid
$("#card-container").on('submit', function(event) {
  // Prevent default posting of form
  event.preventDefault();
  event.stopPropagation();

  // Abort any pending request
  if (bidReq) {
    bidReq.abort();
  }

  if (bidder == "") {
    Materialize.toast('Please log in or sign up before bidding!', 2500, 'red darken-1 rounded');
    return ;
  }

  $form = $("#" + event.target.id);
  $input = $form.children("input");

  // Serialize data in the form and combine it with the search data
  var serialized = $form.serialize() + '&bidder=' + bidder;
  console.log(serialized);

  // Disable the inputs for the duration of the Ajax request.
  // Note: we disable elements AFTER the form data has been serialized.
  // Disabled form elements will not be serialized.
  $input.prop("disabled", true);

  // Fire off the request to php/search.php
  bidReq = $.post (
    "php/add_bid.php",
    serialized,
    disableAddBidButtons
  );

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  bidReq.always(function () {
    // Reenable the inputs
    $input.prop("disabled", false);
  });
});

// Disable the add bid buttons after a bid has been submitted successfully
function disableAddBidButtons(response) {
  console.log("response: " + response);

  if (response === "ERROR!") {
    Materialize.toast('Please submit a valid bid!', 2500, 'red darken-1 rounded');
    return ;
  }

  if (response == "Invalid pet name.") {
    Materialize.toast('Please submit a valid pet name!', 2500, 'red darken-1 rounded');
    return ;
  } else {
    Materialize.toast('Bid added!', 2500, 'green lighten-1 rounded');
  }

  $(".bid-button").addClass("disabled");
}
