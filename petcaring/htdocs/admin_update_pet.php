<?php
  include_once("config.php");
  if(isset($_POST["edit"])){
    $query = "UPDATE pet
            SET pet_name = '$_POST[new_pet_name]', type = '$_POST[type]', species = '$_POST[species]', dob = '$_POST[dob]', size = '$_POST[size]', owner = '$_POST[new_owner]'
            WHERE pet_name = '$_POST[pet_name]' AND owner = '$_POST[owner]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_pet.php?msg=Successfully updated!");
    } else {
      header("Location: admin_pet.php?msg=Failed to update this record!");
    }
  }
