<?php
  include_once("config.php");
  if(isset($_POST["create"])){
    $query = "INSERT INTO pet VALUES ('$_POST[pet_name]', '$_POST[type]', '$_POST[species]', '$_POST[dob]', '$_POST[size]', '$_POST[owner]')";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_pet.php?msg=Successfully added!");
    } else {
      header("Location: admin_pet.php?msg=Failed to add this record!");
    }
  }
