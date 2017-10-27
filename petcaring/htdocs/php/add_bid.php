<?php
  // Connect to the database
  $db = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
          or die('Could not connect: ' . pg_last_error($db));

  if (is_numeric($_POST['submitted_bid'])) {
    $query =  "INSERT INTO bid (price, bidder, caretaker, start_date, end_date)
                VALUES ('$_POST[submitted_bid]',
                'huanhui@gmail.com',
                '$_POST[caretaker]',
                '$_POST[start_date]',
                '$_POST[end_date]')";

    $result = pg_query($db, $query)
                or die('Adding new bid failed: ' . pg_last_error($db));
  } else {
    echo "ERROR!";
  }
  pg_close($db);
?>
