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
  <!-- Import custom stylesheet for search page -->
  <link rel="stylesheet" href="css/add_pet.css">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h3 class="light-blue-text text-lighten-1 center header-padding">Add a pet</h3>

  <div class="w3-container w3-display-container">
    <form id="add_pet">
      <div class="row">
        <div class="col s3 offset-s3">
          <p><label><i class="fa fa-paw"></i> Pet name:</label></p>
          <input class="w3-input w3-border" type="text" placeholder=" Your pet's name here" name="name"/>
        </div>
        <div class="col s3">
          <p><label><i class="fa fa-paw"></i> Species:</label></p>
          <input class="w3-input w3-border" type="text" placeholder=" Your pet species" name="species"/>
        </div>
      </div>
      <div class="row">
        <div class="col s2 offset-s3">
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
        <div class="col s2">
          <p><label><i class="fa fa-paw"></i> Size of pet:</label></p>
          <div class="w3-input-field w3-border-top w3-border-left w3-border-right">
            <select name="size" id="size">
              <option value="" disabled selected>Choose your pet size</option>
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="large">Large</option>
              <option value="giant">Giant</option>
            </select>
          </div>
        </div>
        <div class="col s2">
          <p><label><i class="fa fa-calendar-check-o"></i> Your pet's D.O.B.:</label></p>
          <input type="text" class="w3-border datepicker" placeholder="D.O.B." name="dob">
        </div>
      </div>

      </div>
      <div class="row">
        <div class="col s4 offset-s5">
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align" type="submit" name="submitadd">Add pet
            <i class="material-icons right">done_all</i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Import jQuery and other relevant JavaScript files -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    var owner ='<?php echo $_SESSION[email];?>';
  </script>
  <script type="text/javascript" src="js/add_pet.js"></script>
</body>
</html>
