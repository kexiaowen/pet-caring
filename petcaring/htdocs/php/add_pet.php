<?php
  // Connect to the database
  include("../config.php");

  // Add account function
  if (isset($_POST['name'], $_POST['type_of_pet'], $_POST['species'], $_POST['dob'], $_POST['size'])) {
    $query = "INSERT INTO pet VALUES(
              '$_POST[name]',
              '$_POST[type_of_pet]',
              '$_POST[species]',
              '$_POST[dob]',
              '$_POST[size]',
              '$_POST[owner]')";
    $result = pg_query($db, $query)
                or die('Pet already exists!');

    echo "SUCCESS!";
  } else {
    echo "ERROR!";
  }
?>
