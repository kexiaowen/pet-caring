<?php
  // session_start();

  include_once("config.php");
  echo "BYE";
  $query1 = "UPDATE bid
          SET accepted_bid = 'TRUE'
          WHERE start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]' AND caretaker = '$_POST[caretaker]' AND bidder = '$_POST[bidder]' AND pet_name = '$_POST[pet_name]'" ;
  $result1 = pg_query($db, $query1);
  $query2 = "UPDATE availability
          SET accepted_bid = 'TRUE'
          WHERE start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]' AND caretaker = '$_POST[caretaker]'" ;
  $result2 = pg_query($db, $query2);

?>
