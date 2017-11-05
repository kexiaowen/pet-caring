<?php
  include_once("config.php");
  if(isset($_POST["delete"])){

    $query = "DELETE from bid
              WHERE start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]' AND caretaker = '$_POST[caretaker]' AND pet_name ='$_POST[pet_name]' AND bidder = '$_POST[bidder]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_bid.php?msg=Successfully deleted!");
    } else {
      header("Location: admin_bid.php?msg=Failed to delete this record!");
    }
  }
