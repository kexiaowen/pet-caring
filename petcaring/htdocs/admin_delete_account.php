<?php
  include_once("config.php");
  if(isset($_POST["delete"])){
    // $name = $_POST['name'];
    //$email = $_POST['email'];
    /*$password = $_POST['password'];
    $region = $_POST['region'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];*/

    $query = "DELETE from account
              WHERE email = '$_POST[email]'";
    $result = pg_query($db, $query);

    if($result) {
      header("Location: admin_account.php?msg=Successfully deleted!");
    } else {
      header("Location: admin_account.php?msg=Failed to delete this record!");
    }
  }
