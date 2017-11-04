<?php
  session_start();
  if(!isset($_SESSION[email]) || empty($_SESSION[email]))
    include('headerN.php');
  else include ('headerHi.php');

  $owner = $_GET[owner];
  $pet_name = $_GET[pet_name];
  $type_of_pet = $_GET[type_of_pet];
  $species = $_GET[species];
  $dob = $_GET[dob];
  $size = $_GET[size];
?>
<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <div class="container">
    <h3 class="light-blue-text text-lighten-1 center avail-header">Edit my pet</h3>
    <div class="card-panel">
      <div class="row">
        <?php echo "<form class=\"col s12\"
          action=\"update_pet.php?owner=$owner&pet_name=$pet_name\" method=\"POST\">";?>
          <div class="row">
            <div class="col s6">
              <p> Pet name: <?php echo $pet_name?></p>
            </div>
          </div>
          <div class="row">
            <div class="col s3">
              <p><label><i class="fa fa-paw"></i> Type of Pet:</label></p>
              <div class="w3-input-field w3-border-top w3-border-left w3-border-right">
                <select name="type_of_pet">
                  <option value="<?php echo $type_of_pet?>" selected><?php echo $type_of_pet?></option>
                  <option value="bird">Bird</option>
                  <option value="cat">Cat</option>
                  <option value="dog">Dog</option>
                  <option value="hamster">Hamster</option>
                  <option value="rabbit">Rabbit</option>
                </select>
              </div>
            </div>
            <div class="col s3">
              <p><label><i class="fa fa-paw"></i> Species:</label></p>
              <input class="w3-input w3-border active" type="text" name="species" value="<?php echo $species?>">
            </div>
            <div class="col s3">
              <p><label><i class="fa fa-paw"></i> D.O.B.:</label></p>
              <input class="w3-input w3-border datepicker" type="text" name="dob" value="<?php echo $dob?>">
            </div>
            <div class="col s3">
              <p><label><i class="fa fa-edit"></i> Size:</label></p>
              <div class="w3-input-field w3-border-top w3-border-left w3-border-right">
                <select name="size" id="size">
                  <option value="<?php echo $size?>" selected><?php echo $size?></option>
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                  <option value="giant">Giant</option>
                </select>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="center-align">
                <button class="waves-effect waves-light btn light-blue" type="submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
        </form>
      </div>
    </div>
    <div class="right">
      <h6 class="light light-blue-text"><a href="my_pets.php">Back to my pets</a></h6>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/edit_pet.js"></script>
</body>
</html>
