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

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <style>li {list-style: none;}</style>
 </head>
 <body>
   <div class="container">
    <?php
      include_once("config.php");

      $owner = $_GET['owner'];
      $pet_name = $_GET['pet_name'];
      $query = "DELETE from pet
                WHERE owner = '$owner'
                AND pet_name = '$pet_name'";
      $result = pg_query($db, $query);

      if ($result) {
        echo "<div class=\"container\">
          <div class=\"center\">
            <h3 class=\"light-blue-text light\">Pet details deleted!</h3>
          </div>
          <div class=\"right\">
            <h6 class=\"light\"><a href=\"my_pets.php\" class=\"light-blue-text light\">Back to my pets</a></h6>
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
            <h6 class=\"light\"><a href=\"my_pets.php\" class=\"light-blue-text light\">Back to my pets</a></h6>
          </div>
        </div>";
      }
    ?>
   </div>
 </body>
 </html>
