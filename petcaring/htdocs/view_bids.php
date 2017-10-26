<!DOCTYPE html>
 <head>
   <title>Pet Caring</title>
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!--Import materialize.css-->
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <style>
      .text-size {font-size: 20px;}
      .bid-price {font-size: 50px;}
   </style>
 </head>
 <body>
   <nav class="light-blue lighten-1" role="navigation">
     <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Pet Caring</a>
       <ul class="right">
         <li><a href="index.php">Home</a></li>
         <li><a href="login.php">Log in</a></li>
         <li><a href="signup.php">Sign up</a></li>
       </ul>
     </div>
   </nav>

   <div class="container" id="bid-container">
     <h3 class="light-blue-text text-lighten-1 light center">View bids</h3>
     <div class="row">
       <div class="col s4 center">
         <h6 class="grey-text text-darken-2 text-size light">Start Date: <?php echo $_GET['start_date']; ?></h6>
       </div>
       <div class="col s4 center">
         <h6 class="grey-text text-darken-2 text-size light">End Date: <?php echo $_GET['end_date']; ?></h6>
       </div>
       <div class="col s4 center">
         <h6 class="grey-text text-darken-2 text-size light">Type of Pet: <?php echo $_GET['type_of_pet']; ?></h6>
       </div>
     </div>

     <?php
       require_once 'config.php';
       $sql = "SELECT *
               FROM bid
               WHERE start_date = '$_GET[start_date]' AND end_date = '$_GET[end_date]' AND caretaker = 'jeffereyW@gmail.com'
               ORDER BY price DESC";
       $result = pg_query($db, $sql);
       $counter = 0;
       // Create  while loop and loop through result set
       while($row = pg_fetch_assoc($result)){
         $price = $row['price'];
         $bidder = $row['bidder'];
         $accepted_bid = $row['accepted_bid'];
         // echo "$accepted_bid";

         $query = "SELECT *
                   FROM account
                   WHERE email = '$bidder' ";
         $res = pg_query($db, $query);
         $account_row = pg_fetch_assoc($res);
         $bidder_name = $account_row['name'];

         $query2 = "SELECT *
                    FROM pet
                    WHERE owner = '$bidder'";
         $res2 = pg_query($db, $query2);
         $pet_row = pg_fetch_assoc($res2);
         $pet_type = $pet_row['type'];
         $pet_species = $pet_row['species'];
         $pet_dob = $pet_row['dob'];
         $pet_size = $pet_row['size'];
         $pet_name = $pet_row['pet_name'];

         echo "<div class=\"card hoverable\">
           <div class=\"card-content\">
             <div class=\"row\">";
               if ($accepted_bid) {
                 echo "<span class=\"new badge green left\" data-badge-caption=\"Accepted\"></span>";
               }
             echo "</div>
             <div class=\"row\">
                <div class=\"col s4 offset-s1\">
                  <div class=\"chip\">
                     <img src=\"img/default_user.png\" alt=\"Contact Person\">
                     $bidder_name
                  </div>
                  <p>
                    <span class=\"light-blue-text text-darken-2 text-size light\">About
                    <span class=\"light-blue-text text-darken-2 text-size light\">$pet_name
                  </p>
                  <blockquote>
                    <p>
                      <span class=\"grey-text text-darken-2 text-size light\">Species:
                      <span class=\"grey-text text-darken-2 text-size light\">$pet_species
                    </p>
                    <p>
                      <span class=\"grey-text text-darken-2 text-size light\">Birthdate:
                      <span class=\"grey-text text-darken-2 text-size light\">$pet_dob
                    </p>
                    <p>
                      <span class=\"grey-text text-darken-2 text-size light\">Size:
                      <span class=\"grey-text text-darken-2 text-size light\">$pet_size
                    </p>
                  </blockquote>
                </div>
                <div class=\"col s5 offset-s2\">
                  <div class=\"row\">
                    <span class=\"grey-text text-darken-2\">$</span>
                    <span class=\"light-blue-text bid-price\">$price</span>
                    <span class=\"grey-text text-darken-2\">/hr</span>
                  </div>

                  <form id=\"$counter\">
                    <input id=\"bidder\" type=\"hidden\" value=\"$bidder\" name=\"bidder\" />
                    <input id=\"caretaker\" type=\"hidden\" value=\"jeffereyW@gmail.com\" name=\"caretaker\" />
                    <input id=\"start_date\" type=\"hidden\" value=\"$_GET[start_date]\" name=\"start_date\" />
                    <input id=\"end_date\" type=\"hidden\" value=\"$_GET[end_date]\" name=\"end_date\"/>
                    <button class=\"btn waves-effect waves-light light-blue\" type=\"submit\" name=\"submit\">Accept bid</button>
                  </form>
                </div>
              </div>
             </div>
           </div>";

           $counter = $counter + 1;

       }
       // <a class=\"waves-effect waves-light light-blue btn accept\" onclick=\"return acceptBid($bidder, 'jeffereyW@gmail.com', $_GET[start_date], $_GET[end_date]);\">Accept bid</a>
      ?>

        <div class="right">
          <h6 class="light"><a href="my_availability.php" class="light-blue-text light">Back to my availabilities</a></h6>
        </div>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript">
          /*function acceptBid(bidder, caretaker, start_date, end_date) {
            console.log(bidder);
            console.log(caretaker);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","accept_bid.php?bidder="+bidder+"& caretaker="+caretaker+"&start_date="+start_date+"&end_date="+end_date,true);
            xmlhttp.send();
          }
          $("#accept").on('click', function() {
            console.log(bidder);
            console.log(caretaker);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","accept_bid.php?bidder="+bidder+"& caretaker="+caretaker+"&start_date="+start_date+"&end_date="+end_date,true);
            xmlhttp.send();
          });*/
          // Variable to hold request
          var request;

          // Bind to the submit event of our form
          $('#bid-container').on('submit', function(event) {

              // Prevent default posting of form - put here to work in case of errors
              event.preventDefault();
              event.stopPropagation();

              // Abort any pending request
              if (request) {
                  request.abort();
              }
              // setup some local variables
              $form = $("#" + event.target.id);
              console.log("id: " + $form);

              // Let's select and cache all the fields
              $inputs = $form.find("input");

              // Serialize the data in the form
              var serializedData = $form.serialize();
              console.log("data: " + serializedData);

              // Let's disable the inputs for the duration of the Ajax request.
              // Note: we disable elements AFTER the form data has been serialized.
              // Disabled form elements will not be serialized.
              $inputs.prop("disabled", true);

              // Fire off the request to /form.php
              request = $.ajax({
                  url: "accept_bid.php",
                  type: "post",
                  data: serializedData
              });

              // Callback handler that will be called on success
              request.done(function (response, textStatus, jqXHR){
                  console.log("Response: " + response);
              });

              // Callback handler that will be called on failure
              request.fail(function (jqXHR, textStatus, errorThrown){
                  // Log the error to the console
                  console.error(
                      "The following error occurred: "+
                      textStatus, errorThrown
                  );
              });

              // Callback handler that will be called regardless
              // if the request failed or succeeded
              request.always(function () {
                  // Reenable the inputs
                  $inputs.prop("disabled", false);
              });

              // Reload the page after update
              location.reload();

          });
      </script>
 </body>
 </html>
