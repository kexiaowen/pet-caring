<?php
  include_once("config.php");
  if(isset($_POST["create"])){
    $query = "INSERT INTO account VALUES ('$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[region]', '$_POST[address]', '$_POST[postal_code]')";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_account.php?msg=Successfully added!");
    } else {
      header("Location: admin_account.php?msg=Failed to add this record!pg_last_error($db)");
    }
  }
