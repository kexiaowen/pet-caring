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

  <h3 class="light-blue-text text-lighten-1 center header-padding">Add availability</h3>

  <div class="w3-container w3-display-container">
    <form id="add_availability" action="add_availability.php" method="post">
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> Start Date (YYYY-MM-DD):</label></p>
          <input class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" name="start_date"/>
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> End Date (YYYY-MM-DD):</label></p>
          <input class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" name="end_date"/>
        </div>
        <div class="col s4">
            <p><label><i class="fa fa-pet"></i> Type of Pet:</label></p>
            <input class="w3-input w3-border" type="text" placeholder="bird/cat/dog/hamster/rabbit" name="type_of_pet"/>
        </div>
      <div class="row">
          <div class="col s4">
            <p><label><i class="fa fa-caretaker"></i> Caretaker (email):</label></p>
            <input class="w3-input w3-border" type="text" placeholder=" Your email" name="caretaker"/>
          </div>
          <div class="col s4">
            <p><label><i class="fa fa-dollar"></i> Minimum bid:</label></p>
            <input class="w3-input w3-border" type="number" name="min_bid">
          </div>
        <div class="col s4">
          <p><label><i class="fa fa-remark"></i> Additional remarks:</label></p>
          <input class="w3-input w3-border" type="text" placeholder="Remarks (if any)" name="remark"/>
        </div>

      </div>
      <div class="row">
        <div class="col s4 offset-s4 center">
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align add-bid" type="submit" name="submitadd">Add availability
            <i class="material-icons right"></i>
          </button>
        </div>
      </div>
      <!--<p><button class="w3-button w3-block w3-green w3-left-align" type="submit" name="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></p>-->
    </form>
  </div>

  <?php
      // Connect to the database -- remember to change the db name and password accordingly!!
      $db     = pg_connect("host=localhost port=5432 dbname=CS2102-Group8 user=postgres password=cs2102")
                  or die('Could not connect: ' . pg_last_error($db));

      // Add account function
      if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO availability VALUES(
                  '$_POST[start_date]',
                  '$_POST[end_date]',
                  '$_POST[type_of_pet]',
                  '$_POST[caretaker]',
                  '$_POST[min_bid]',
                  'false',
                  '$_POST[remark]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
