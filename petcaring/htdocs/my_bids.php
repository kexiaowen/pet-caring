<?php
  session_start();
  if(!isset($_SESSION[email]) || empty($_SESSION[email]))
    include('headerN.php');
  else include ('headerHi.php');
?>
<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!-- Import custom stylesheet for search page -->
  <link rel="stylesheet" href="css/my_bids.css">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <div class="container">
    <h3 class="light-blue-text text-lighten-1 light center">Bids I have submitted</h3>
    <?php
      require_once 'config.php';
      $query = "SELECT *
              FROM bid
              WHERE bidder = '$_SESSION[email]'";

      $result = pg_query($db, $query);

      // If the user has not submitted any bids
      if (pg_num_rows($result) == 0) {
        echo "<h5 class=\"center grey-text light\">You have not submitted any bids.</h5>";
      }

      // Create  while loop and loop through result set
      while ($row = pg_fetch_assoc($result)) {

        $price = $row['price'];
        $accepted_bid  = $row['accepted_bid'];
        $bidder = $row['bidder'];
        $caretaker = $row['caretaker'];
        $pet_name = $row['pet_name'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];

        $query2 = "SELECT type
                    FROM pet
                    WHERE owner = '$bidder'
                    AND pet_name = '$pet_name'";

        $result2 = pg_query($db, $query2);
        $type_of_pet = pg_fetch_assoc($result2)['type'];

        $query3 = "SELECT avail.accepted_bid
                    FROM availability AS avail
                    WHERE avail.start_date = '$start_date'
                    AND avail.end_date = '$end_date'
                    AND avail.caretaker = '$caretaker'";
        $result3 = pg_query($db, $query3);
        $avail_status = pg_fetch_assoc($result3)['accepted_bid'];
        $status;

        echo "<div class=\"card hoverable\">
          <div class=\"card-content\">
            <div class=\"row\">";
              if ($accepted_bid == 't') {
                $status = "ACCEPTED!";
                echo "<span class=\"new badge green left\" data-badge-caption=\"Accepted\"></span>";
            } else if ($avail_status == 'f') {
                $status = "PENDING";
                echo "<span class=\"new badge grey left\" data-badge-caption=\"Pending\"></span>";
            } else {
                $status = "REJECTED";
                echo "<span class=\"new badge red left\" data-badge-caption=\"Rejected\"></span>";
            }
            echo "
            </div>
            <div class=\"row\">
              <div class=\"col s3 \">
                <img src=\"img/$type_of_pet.jpg\" class=\"circle\" height=\"200\">
              </div>

              <div class=\"col s7 offset-s2\">

                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Start date:
                  <span class=\"grey-text text-darken-2 text-size light\">$start_date
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">End date:
                  <span class=\"grey-text text-darken-2 text-size light\">$end_date
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Type of pet:
                  <span class=\"grey-text text-darken-2 text-size light\">$type_of_pet
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Bid I offered: $
                  <span class=\"grey-text text-darken-2 text-size light\">$price
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">My remark:
                  <span class=\"grey-text text-darken-2 text-size light\">$remark
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Desired caretaker:
                  <span class=\"grey-text text-darken-2 text-size light\">$caretaker
                </p>
              </div>
            </div>
          </div>
        </div>";
      }
    ?>
  </div>
</body>
</html>
