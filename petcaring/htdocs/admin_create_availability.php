<?php
  include_once("config.php");
  if(isset($_POST["create"])){
    $query = "INSERT INTO availability VALUES ('$_POST[start_date]', '$_POST[end_date]', '$_POST[type_of_pet]', '$_POST[caretaker]', '$_POST[min_bid]', '$_POST[accepted_bid]', '$_POST[remark]')";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_availability.php?msg=Successfully added!");
    } else {
      header("Location: admin_availability.php?msg=Failed to add this record!");
    }
  }
