<?php
  include_once("config.php");
  if(isset($_POST["edit"])){
    $query = "UPDATE account
            SET name = '$_POST[name]', email = '$_POST[new_email]', password = '$_POST[password]', region = '$_POST[region]', address = '$_POST[address]', postal_code = '$_POST[postal_code]'
            WHERE email = '$_POST[email]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_account.php?msg=Successfully updated!");
    } else {
      header("Location: admin_account.php?msg=Failed to update this record!");
    }
  }
