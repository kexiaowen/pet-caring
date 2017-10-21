<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!-- Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Import materialize.css -->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- Import custom stylesheet for search page -->
  <link rel="stylesheet" href="css/searchpage.css">
  <!-- Stylesheet for Futura fonts -->
  <link rel="stylesheet" type="text/css" href="css/futuraFonts.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <!-- Navigation bar -->
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
        <i class="fa fa-paw fa-2x"></i>
        <a id="logo-container" href="#" class="brand-logo"> Pet Caring</a>
      <ul class="right">
        <li><a href="/petcaring/index.php">Home</a></li>
        <li><a href="/petcaring/login.php">Log in</a></li>
        <li><a href="/petcaring/signup.php">Sign up</a></li>
      </ul>
    </div>
  </nav>

  <h3 class="light-blue-text text-lighten-1 center header-padding">Find a caretaker
    <i class="fa fa-male"></i>
    <i class="fa fa-female"></i>
  </h3>

  <div class="w3-container w3-display-container">
    <form id="search" action="search.php" method="post">
      <!-- Form fields -->
      <div class="row">
        <div class="col s3">
          <p><label><i class="fa fa-calendar-check-o"></i> Start Date:</label></p>
           <input type="text" class="w3-border datepicker" placeholder="Choose a start date" name="start_date">
        </div>
        <div class="col s3">
          <p><label><i class="fa fa-calendar-check-o"></i> End Date:</label></p>
          <input type="text" class="w3-border datepicker" placeholder="Choose an end date" name="end_date">
        </div>
        <div class="col s3">
          <p><label><i class="fa fa-paw"></i> Type of Pet:</label></p>
          <div class="w3-input-field w3-border-top w3-border-left w3-border-right">
            <select name="type_of_pet">
              <option value="" disabled selected>Choose your pet type</option>
              <option value="bird">Bird</option>
              <option value="cat">Cat</option>
              <option value="dog">Dog</option>
              <option value="hamster">Hamster</option>
              <option value="rabbit">Rabbit</option>
            </select>
          </div>
        </div>
        <div class="col s3">
          <p><label><i class="fa fa-dollar"></i> Maximum bid:</label></p>
          <input class="w3-input w3-border" type="text" name="max_bid">
        </div>
      </div>

      <!-- Find caretaker button -->
      <div class="row">
        <div class="col s4 offset-s4 center">
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align search-avail" type="submit" name="submit">Search availability
            <i class="material-icons right">search</i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Card display -->
  <div class="container scrolls">
  <div class="card horizontal hoverable">
    <div class="card-image">
      <img src="img/penguin.png" class="circle">
    </div>
    <div class="card-stacked">
      <div class="card-content row">
        <div class="col s6">
          <p name="name">Name:</p>
          <p name="region">Region:</p>
          <p name="address">Address:</p>
          <p name="remark">Remark:</p>
        </div>
        <div class="col s6">
          <p name="min_bid">Mininum bid required:</p>
          <p>Your bid:
            <i class="fa fa-dollar"></i>
          </p>
          <input class="w3-border" type="text" name="submitted_bid">
          <span style="display: flex; flex-direction: row-reverse">
            <a class="waves-effect waves-light btn">Add bid</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Section for results (card display) -->
  <!-- Note that each card is a row in a table (easier for dynamic generation) -->

  <table style="width:100%" class="striped">
    <thead>
      <tr>
        <th class="light-blue-text text-darken-4">Name</th>
        <th class="light-blue-text text-darken-4">Region</th>
        <th class="light-blue-text text-darken-4">Address</th>
        <th class="light-blue-text text-darken-4">Minimum bid required</th>
      </tr>
    </thead>

    <?php
      // Connect to the database
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
                  or die('Could not connect: ' . pg_last_error($db));;
      if (isset($_POST['submit'])) {
        $query = "SELECT acc.name, acc.region, acc.address, avail.min_bid
                    FROM account AS acc, availability AS avail
                    WHERE acc.email = avail.caretaker
                    AND avail.start_date <= '$_POST[start_date]'
                    AND avail.end_date >= '$_POST[end_date]'
                    AND avail.type_of_pet = '$_POST[type_of_pet]'
                    AND avail.min_bid <= '$_POST[max_bid]'
                    AND avail.acceptedBid = 'false'";
        $result = pg_query($db, $query)
                    or die('Search query failed: ' . pg_last_error($db));
        // Create  while loop and loop through result set
    	while($row = pg_fetch_assoc($result)){
	        $name  = $row['name'];
          $region  = $row['region'];
          $address = $row['address'];
          $min_bid = $row['min_bid'];
          // Display the result of the array
          echo "<tr>";
          	echo "<td align='center'>" .$name . "</td>";
            echo "<td align='center'>" .$region . "</td>";
            echo "<td align='center'>" .$address . "</td>";
            echo "<td align='center'>" .$min_bid . "</td>";
          echo "</tr>";
    	}
      }
    ?>
  </table>

  <!-- Import jQuery and other relevant JavaScript files -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/searchpage.js"></script>
</body>
</html>
