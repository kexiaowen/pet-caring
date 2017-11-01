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
  <style></style>
</head>
<body>
  
  <?php
  	include_once("config.php");
  	$query = "UPDATE availability
            SET type_of_pet= '$_POST[type_of_pet]', min_bid= '$_POST[min_bid]', remark='$_POST[remark]'
  			    WHERE start_date = '$_GET[start_date]' AND end_date = '$_GET[end_date]' AND caretaker = '$_GET[caretaker]'" ;
    $result = pg_query($db, $query);
    if ($result) {
      echo "<div class=\"container\">
        <div class=\"center\">
          <h3 class=\"light-blue-text light\">You have successfully updated this availability!</h3>
        </div>
        <div class=\"right\">
          <h6 class=\"light\"><a href=\"my_availability.php\" class=\"light-blue-text light\">Back to my availabilities</a></h6>
        </div>
      </div>";
    } else {
      echo "<div class=\"container\">
        <div class=\"center\">
          <h3 class=\"light-blue-text light\">";
             echo "pg_last_error($db)";
          echo "</h3>
        </div>
        <div class=\"right\">
          <h6 class=\"light\"><a href=\"my_availability.php\" class=\"light-blue-text light\">Back to my availabilities</a></h6>
        </div>
      </div>";
    }
  ?>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
