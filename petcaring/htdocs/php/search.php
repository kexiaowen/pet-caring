<?php
  // Connect to the database
  $db = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
          or die('Could not connect: ' . pg_last_error($db));

  if (isset($_POST['start_date'], $_POST['end_date'], $_POST['type_of_pet'], $_POST['max_bid']) &&
        $_POST['start_date'] !== "" && $_POST['end_date'] !== "" && is_numeric($_POST['max_bid'])) {
    $formatted_start_date = date_format(date_create($_POST['start_date']), 'Y-m-d');
    $formatted_end_date = date_format(date_create($_POST['end_date']), 'Y-m-d');
    $query = "SELECT acc.name, acc.email, acc.region, acc.address, avail.min_bid, avail.remark
                FROM account AS acc, availability AS avail
                WHERE acc.email = avail.caretaker
                AND avail.start_date <= '$formatted_start_date'
                AND avail.end_date >= '$formatted_end_date'
                AND avail.type_of_pet = '$_POST[type_of_pet]'
                AND avail.min_bid <= '$_POST[max_bid]'
                AND avail.acceptedBid = 'false'";
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
      $min_bid = $row['min_bid'];
      $remark  = $row['remark'];

      $arr = array($name, $email, $region, $address, $min_bid, $remark);
      $fullArr[$counter] = $arr;
      $counter++;
    }
    echo json_encode($fullArr);
  } else {
    echo "ERROR!";
  }

  pg_close($db);
?>
