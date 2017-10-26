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
  <div class="container">
    <h3 class="light-blue-text text-lighten-1 light center">Manage my availabilities</h3>
    <?php
      require_once 'config.php';
      /*$sql = "SELECT *
              FROM availability
              WHERE caretaker = $_SESSION[email]
              ORDER BY start_date DESC";*/
      $sql = "SELECT *
              FROM availability
              WHERE caretaker = 'jeffereyW@gmail.com'
              ORDER BY start_date DESC";
      $result = pg_query($db, $sql);
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
                  WHERE caretaker = 'jeffereyW@gmail.com' AND start_date = '2015-11-16' AND end_date = '2015-11-22'";
        $res = pg_query($db, $query);
        $bid_row = pg_fetch_assoc($res);
        $bidder_num = $bid_row['total'];
        // $bidder_num = 20;
        echo "<div class=\"card hoverable\">
          <div class=\"card-content\">
            <div class=\"row\">";
              if ($acceptedBid) {
                echo "<span class=\"new badge green left\" data-badge-caption=\"Accepted\"></span>";
              } else {
                echo "<span class=\"new badge red left\" data-badge-caption=\"Pending\"></span>
                <a href=\"delete_availability.php?start_date=$start_date & end_date=$end_date & caretaker=$caretaker\"><i class=\"material-icons right delete\">delete</i></a>
                <a href=\"edit_availability.php?start_date=$start_date & end_date=$end_date & caretaker=$caretaker\"><i class=\"material-icons right edit\">mode_edit</i></a>";
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
