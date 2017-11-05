<?php
  // Connect to the database
  include("../config.php");

  if (isset($_POST['start_date'], $_POST['end_date'], $_POST['type_of_pet'], $_POST['max_bid']) &&
        $_POST['start_date'] !== "" && $_POST['end_date'] !== "" && is_numeric($_POST['max_bid'])) {
    $first_format_start = str_replace(',','', $_POST['start_date']);
    $first_format_end = str_replace(',','', $_POST['end_date']);
    $formatted_start_date = date('Y-m-d', strtotime($first_format_start));
    $formatted_end_date = date('Y-m-d', strtotime($first_format_end));
    $query = "SELECT acc.name, acc.email, acc.region, acc.address, avail.start_date, avail.end_date, avail.min_bid, avail.remark
                FROM account AS acc, availability AS avail
                WHERE acc.email = avail.caretaker
                AND acc.email <> '$_POST[bidder]'
                AND avail.start_date <= '$formatted_start_date'
                AND avail.end_date >= '$formatted_end_date'
                AND avail.type_of_pet = '$_POST[type_of_pet]'
                AND avail.min_bid <= '$_POST[max_bid]'
                AND avail.accepted_bid = 'false'";
    $result = pg_query($db, $query)
                or die('Search query failed: ' . pg_last_error($db));

    // Initialise variables
    // Note that fullArr will eventually be an array of arrays
    $counter = 0;
    $fullArr = array();
    // Create  while loop and loop through result set
    while($row = pg_fetch_assoc($result)) {
        $name  = $row['name'];
        $email = $row['email'];
      $region  = $row['region'];
      $address = $row['address'];
      $start_date = $row['start_date'];
      $end_date = $row['end_date'];
      $min_bid = $row['min_bid'];
      $remark  = $row['remark'];

      $arr = array($name, $email, $region, $address, $start_date, $end_date, $min_bid, $remark);
      $fullArr[$counter] = $arr;
      $counter++;
    }
    echo json_encode($fullArr);
  } else {
    echo "ERROR!";
  }

  pg_close($db);
?>
