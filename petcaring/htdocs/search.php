<?php
  session_start();
  if(!isset($_SESSION[email]) || empty($_SESSION[email]))
    include('headerN.php');
  else include ('headerHi.php');
 ?>
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
  <link rel="stylesheet" href="css/search.css">
  <!-- Stylesheet for Futura fonts -->
  <link rel="stylesheet" type="text/css" href="css/futuraFonts.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h3 class="light-blue-text text-lighten-1 center header-padding">Find a caretaker</h3>

  <div class="w3-container w3-display-container">
    <form id="search">
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
            <select name="type_of_pet" id="type_of_pet">
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
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align" type="submit" name="submit" form="search">
            Search availability
            <i class="material-icons right">search</i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Card display: cards are generated dynamically -->
  <div id="card-container">
  <!-- Code for a sample card (slightly outdated)
  <div class="card horizontal hoverable">
    <div class="card-image">
      <img src="img/penguin.png" class="circle">
    </div>
    <div class="card-stacked row">
      <div class="card-content">
        <div class="col s6">
          <p name="name">Name:</p>
          <p name="region">Region:</p>
          <p name="address">Address:</p>
          <p name="remark">Remark:</p>
        </div>
        <div class="col s6">
          <p name="min_bid">Mininum bid required:</p>
          <form id="add-bid">
            <p class="col s3">Your bid: <i class="fa fa-dollar"></i></p>
            <input class="col s3 w3-border" type="text" name="submitted_bid">
            <div id="add-bid-btn">
              <button class="btn waves-effect waves-light light-blue lighten-2" type="submit" name="add-bid" form="add-bid">
                Add bid
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>-->
  </div>

  <!-- Import jQuery and other relevant JavaScript files -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    var bidder ='<?php echo $_SESSION[email];?>';
  </script>
  <script type="text/javascript" src="js/search.js"></script>
</body>
</html>
