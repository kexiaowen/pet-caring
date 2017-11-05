<?php
  include_once("config.php");
  if(isset($_POST["edit"])){
    $query = "UPDATE bid
            SET start_date = '$_POST[new_start_date]', end_date = '$_POST[new_end_date]', caretaker = '$_POST[new_caretaker]', pet_name = '$_POST[new_pet_name]', bidder = '$_POST[new_bidder]', accepted_bid = '$_POST[accepted_bid]', price = '$_POST[price]'
            WHERE start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]' AND caretaker = '$_POST[caretaker]' AND pet_name ='$_POST[pet_name]' AND bidder = '$_POST[bidder]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_bid.php?msg=Successfully updated!");
    } else {
      header("Location: admin_bid.php?msg=Failed to update this record!");
    }
  }
