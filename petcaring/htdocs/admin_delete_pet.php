<?php
  include_once("config.php");
  if(isset($_POST["delete"])){

    $query = "DELETE from pet
              WHERE pet_name = '$_POST[pet_name]' AND owner = '$_POST[owner]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_pet.php?msg=Successfully deleted!");
    } else {
      header("Location: admin_pet.php?msg=Failed to delete this record!");
    }
  }
