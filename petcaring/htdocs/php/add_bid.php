<?php
  // Connect to the database
  include("../config.php");

  if (!is_numeric($_POST['submitted_bid'])) {
    echo "ERROR!";
  } else {
    $query =  "INSERT INTO bid (price, bidder, caretaker, pet_name, start_date, end_date)
                VALUES ('$_POST[submitted_bid]',
                '$_POST[bidder]',
                '$_POST[caretaker]',
                '$_POST[pet_name]',
                '$_POST[start_date]',
                '$_POST[end_date]')";

    $result = pg_query($db, $query)
                or die('Invalid pet name.');
  }
  pg_close($db);
?>
