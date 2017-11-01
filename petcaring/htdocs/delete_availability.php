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
       $start_date = $_GET['start_date'];
       $end_date = $_GET['end_date'];
       $caretaker = $_GET['caretaker'];
       $query = "DELETE from availability WHERE start_date = '$_GET[start_date]' AND end_date = '$_GET[end_date]' AND caretaker = '$_GET[caretaker]'";
       $result = pg_query($db, $query);

       if ($result) {
         echo "<div class=\"container\">
           <div class=\"center\">
             <h3 class=\"light-blue-text light\">You have successfully deleted this availability!</h3>
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
   </div>
 </body>
 </html>
