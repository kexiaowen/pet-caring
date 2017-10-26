<?php
  session_start();
  include("config.php");
  $start_date = $_GET['start_date'];
  $end_date = $_GET['end_date'];
  $caretaker = $_GET['caretaker'];

  $query = "SELECT * FROM availability WHERE start_date = $start_date AND end_date = $end_date AND caretaker = $caretaker";
  $result = pg_query($db, $query);
  //returning data
  $row = pg_fetch_assoc($result);
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
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    .bidder-num {font-size: 50px;}
    .text-size {font-size: 20px;}
    .avail-header {font-weight: 200;}
    /* label color */
   /*.input-field label {
     color: #000;
   }*/
   /* label focus color */
    input:not([type]):focus:not([readonly]),
    input[type=text]:not(.browser-default):focus:not([readonly]),
    input[type=email]:not(.browser-default):focus:not([readonly]),
    input[type=url]:not(.browser-default):focus:not([readonly]),
    input[type=time]:not(.browser-default):focus:not([readonly]),
    input[type=date]:not(.browser-default):focus:not([readonly]),
    input[type=datetime]:not(.browser-default):focus:not([readonly]),
    input[type=datetime-local]:not(.browser-default):focus:not([readonly]),
    input[type=tel]:not(.browser-default):focus:not([readonly]),
    input[type=number]:not(.browser-default):focus:not([readonly]),
    input[type=search]:not(.browser-default):focus:not([readonly]),
    textarea:focus:not([readonly]) {
      border-bottom: none;
      -webkit-box-shadow: none;
              box-shadow: none;
    }
    .input-field textarea[type=text]:focus + label{
      color: #03a9f4;
    }
    .input-field textarea[type=text]:focus {
      border-bottom: 1px solid #03a9f4;
      box-shadow: 0 1px 0 0 #03a9f4;
    }

   /*
   ,
   textarea.materialize-textarea:focus:not([readonly])
   .input-field input[type=text]:focus + label {
     color: #03a9f4;
   }
   // label underline focus color
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #03a9f4;
     box-shadow: 0 1px 0 0 #03a9f4;
   }
   // valid color
   .input-field input[type=text].valid {
     border-bottom: 1px solid #03a9f4;
     box-shadow: 0 1px 0 0 #03a9f4;
   }
   // invalid color
   .input-field input[type=text].invalid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }*/
   /* icon prefix focus color */
   /*.input-field .prefix.active {
     color: #03a9f4;
   }*/
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
    <h3 class="light-blue-text text-lighten-1 center avail-header">Edit my availability</h3>
    <?php
      /*echo $start_date;
      echo $end_date;
      echo $caretaker;
      echo $row['min_bid'];*/
    ?>
    <div class="card-panel">
      <div class="row">
        <?php echo "<form class=\"col s12\" action=\"update_availability.php?start_date=$start_date & end_date=$end_date & caretaker=$caretaker\" method=\"POST\">";?>
              <div class="row">
                <div class="col s6">
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
                <div class="col s6">
                  <p><label><i class="fa fa-dollar"></i> Minimum bid:</label></p>
                  <input class="w3-input w3-border active" type="text" name="min_bid" value="<?php $row['min_bid']?>">
                </div>
                <!--<div class="col s12">
                  <p><label>Remark:</label></p>
                  <input class="w3-input w3-border" type="text" name="remark" value="<?php //echo $row['remark'];?>">
                </div>-->
                <div class="input-field col s12">
                  <textarea id="remark" type="text" class="materialize-textarea" name="remark" rows="3"></textarea>
                  <label for="remark" class="active">Remark</label>
                </div>
              </div>


          <!--<div class="row">
            <div class="input-field col s12">
              <textarea id="remark" type="text" class="materialize-textarea validate" name="content" rows="3" value="testing" ></textarea>
              <label for="remark" class="active">Remark</label>
            </div>
         </div>-->

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
      <h6 class="light light-blue-text"><a href="my_availability.php">Back to my availabilities</a></h6>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    $( document ).ready(function(){
      Materialize.updateTextFields();
      $('#remark').val('remark');
      $('#remark').trigger('autoresize');
      $('select').material_select();
      $('select').css('color', 'blue');
    });
  </script>
</body>
</html>
