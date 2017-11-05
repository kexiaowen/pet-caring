<?php
  include_once("config.php");
  if(isset($_POST["edit"])){
    $query = "UPDATE availability
            SET start_date = '$_POST[new_start_date]', end_date = '$_POST[new_end_date]', caretaker = '$_POST[new_caretaker]', type_of_pet = '$_POST[type_of_pet]', min_bid = '$_POST[min_bid]', accepted_bid = '$_POST[accepted_bid]', remark = '$_POST[remark]'
            WHERE start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]' AND caretaker = '$_POST[caretaker]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_availability.php?msg=Successfully updated!");
    } else {
      header("Location: admin_availability.php?msg=Failed to update this record!");
    }
  }
