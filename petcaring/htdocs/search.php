<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
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

  <h3 class="light-blue-text text-lighten-1 center header-padding">Find a caretaker</h3>

  <div class="w3-container w3-display-container">
    <form id="search" action="basic_search.php" method="post">
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> Start Date (YYYY-MM-DD):</label></p>
      		<!--<input class="w3-input w3-border datepicker" type="text" placeholder="YYYY/MM/DD" name="startdate" required>-->
          <input class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" name="start_date"/>
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> End Date (YYYY-MM-DD):</label></p>
      		<input class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" name="end_date"/>
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-pet"></i> Type of Pet:</label></p>
      		<!--<select class="w3-input w3-border" name ="type_of_pet">
    			  <option value="" disabled selected>Choose your option</option>
    			  <option value="bird">Bird</option>
    			  <option value="cat">Cat</option>
    			  <option value="dog">Dog</option>
    			  <option value="hamster">Hamster</option>
    			  <option value="rabbit">Rabbit</option>
    			</select>-->
          <input class="w3-input w3-border" type="text" placeholder="bird/cat/dog/hamster/rabbit" name="type_of_pet"/>
        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-dollar"></i> Minimum bid:</label></p>
          <input class="w3-input w3-border" type="number" name="min_bid">
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-dollar"></i> Maximum bid:</label></p>
          <input class="w3-input w3-border" type="number" name="max_bid">
        </div>

      </div>
      <div class="row">
        <div class="col s4 offset-s4 center">
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align search-avail" type="submit" name="submit">Search availability
            <i class="material-icons right">search</i>
          </button>
        </div>
      </div>
      <!--<p><button class="w3-button w3-block w3-green w3-left-align" type="submit" name="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></p>-->
    </form>
  </div>

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
      $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=361023")
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
	        $name    = $row['name'];
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
</body>
</html>
