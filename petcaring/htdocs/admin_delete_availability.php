<?php
  include_once("config.php");
  if(isset($_POST["delete"])){

    $query = "DELETE from availability
              WHERE caretaker = '$_POST[caretaker]' AND start_date = '$_POST[start_date]' AND end_date = '$_POST[end_date]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_availability.php?msg=Successfully deleted!");
    } else {
      header("Location: admin_availability.php?msg=Failed to delete this record!");
    }
  }
