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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h3 class="light-blue-text text-lighten-1 center header-padding">Add availability</h3>

  <div class="w3-container w3-display-container">
    <form id="add_availability">
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> Start Date:</label></p>
          <input type="text" class="w3-border datepicker" placeholder="I am free from..." name="start_date">
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-calendar-check-o"></i> End Date:</label></p>
          <input type="text" class="w3-border datepicker" placeholder="I am free until..." name="end_date">
        </div>
        <div class="col s4">
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
      <div class="row">
          <div class="col s4">
            <p><label><i class="fa fa-dollar"></i> Minimum bid:</label></p>
            <input class="w3-input w3-border" type="text" name="min_bid">
          </div>
        <div class="col s8">
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
    </form>
  </div>

  <!-- Import jQuery and other relevant JavaScript files -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    var caretaker ='<?php echo $_SESSION[email];?>';
  </script>
  <script type="text/javascript" src="js/add_availability.js"></script>
</body>
</html>
