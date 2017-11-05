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
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    .bidder-num {font-size: 50px;}
    .text-size {font-size: 20px;}
    .delete {font-size: 30px;}
    .edit {font-size: 30px;}
    .delete:hover {
      color: #f44336;
      opacity: 0.6;
    }
    .edit:hover {
      color: #4caf50;
      opacity: 0.6;
    }
    #add-avail {
        position: fixed;
        bottom: 8px;
        right: 8px;
    }
  </style>
</head>
<body>
  <a class="waves-effect waves-light btn light-blue" href="add_availability.php" id="add-avail">Add availability</a>
  <div class="container">
    <h3 class="light-blue-text text-lighten-1 light center">Manage my availabilities</h3>

    <?php
      require_once 'config.php';
      $sql = "SELECT *
              FROM availability
              WHERE caretaker = '$_SESSION[email]'
              ORDER BY start_date ASC";
      /*$sql = "SELECT *
              FROM availability
              WHERE caretaker = 'jeffereyW@gmail.com'
              ORDER BY start_date DESC";*/
      $result = pg_query($db, $sql);

      // If the user has not submitted any bids
      if (pg_num_rows($result) == 0) {
        echo "<h5 class=\"center\">You have not added any availbilities.</h5>";
      }

      // Create  while loop and loop through result set
      while($row = pg_fetch_assoc($result)){
        $start_date    = $row['start_date'];
        $end_date  = $row['end_date'];
        $type_of_pet = $row['type_of_pet'];
        $caretaker = $row['caretaker'];
        $min_bid = $row['min_bid'];
        $acceptedBid = $row['accepted_bid'];
        $remark = $row['remark'];

        $query = "SELECT count(*) as total
                  FROM bid
                  WHERE caretaker = '$_SESSION[email]' AND start_date = '$start_date' AND end_date = '$end_date'";
        $res = pg_query($db, $query);
        $bid_row = pg_fetch_assoc($res);
        $bidder_num = $bid_row['total'];
        $max_bid = 0;
        if ($bidder_num != 0) {
          $max_bid_query = "SELECT price
                            FROM bid as b1
                            WHERE NOT EXISTS (
                              SELECT *
                              FROM bid as b2
                              WHERE b1.price < b2.price
                            )";
          $max_bid_res = pg_query($db, $max_bid_query);
          $max_bid_row = pg_fetch_assoc($max_bid_res);
          $max_bid = $max_bid_row['price'];
        }

        echo "<div class=\"card hoverable\">
          <div class=\"card-content\">
            <div class=\"row\">";
              if ($acceptedBid == 't') {
                echo "<span class=\"new badge green left\" data-badge-caption=\"Accepted\"></span>";
              } else {
                echo "<span class=\"new badge red left\" data-badge-caption=\"Pending\"></span>";
              }
              if ($bidder_num == 0 && $acceptedBid == 'f') {
                echo "
                  <a href=\"delete_availability.php?start_date=$start_date & end_date=$end_date & caretaker=$caretaker\"><i class=\"material-icons right delete\">delete</i></a>
                  <a href=\"edit_availability.php?start_date=$start_date & end_date=$end_date & caretaker=$caretaker & min_bid=$min_bid & remark=$remark\"><i class=\"material-icons right edit\">mode_edit</i></a>";
              }
            echo "
            </div>
            <div class=\"row\">
              <div class=\"col s3 \">
                <img src=\"img/$type_of_pet.jpg\" class=\"circle\" height=\"200\">
              </div>

              <div class=\"col s4 offset-s1\">

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
                  <span class=\"light-blue-text text-darken-2 text-size light\">Minimum bid required:
                  <span class=\"grey-text text-darken-2 text-size light\">$min_bid
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">My remark:
                  <span class=\"grey-text text-darken-2 text-size light\">$remark
              </div>
              <div class=\"col s4\">
                <div class=\"row\">
                  <span class=\"light-blue-text bidder-num\">$bidder_num</span>
                  <span class=\"grey-text text-darken-2\">bidders</span>
                </div>
                <div class=\"row\">
                  <span class=\"grey-text text-darken-2\">Current maximum bid is</span>
                  <span class=\"light-blue-text text-darken-2\">$$max_bid/hr</span>
                </div>
                <div class=\"row\">
                  <a class=\"waves-effect waves-light light-blue btn\" href=\"view_bids.php?start_date=$start_date & end_date=$end_date & type_of_pet=$type_of_pet\">View all bids</a>
                </div>
              </div>
            </div>

          </div>
        </div>";
      }
    ?>
  </div>
</body>
</html>
