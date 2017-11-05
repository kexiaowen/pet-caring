<?php
  include_once("config.php");
  if(isset($_POST["create"])){
    $query = "INSERT INTO bid VALUES ('$_POST[price]', '$_POST[accepted_bid]', '$_POST[bidder]', '$_POST[caretaker]', '$_POST[pet_name]', '$_POST[start_date]', '$_POST[end_date]')";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_bid.php?msg=Successfully added!");
    } else {
      header("Location: admin_bid.php?msg=Failed to add this record!");
    }
  }
