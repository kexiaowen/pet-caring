<?php
  // Connect to the database
  include('../config.php');

  if (isset($_POST['start_date'], $_POST['end_date'], $_POST['type_of_pet']) && is_numeric($_POST['min_bid'])) {
    $formatted_start_date = date_format(date_create($_POST['start_date']), 'Y-m-d');
    $formatted_end_date = date_format(date_create($_POST['end_date']), 'Y-m-d');

    if ($formatted_end_date < $formatted_start_date) {
        die('Invalid dates.');
    }

    $query = "INSERT INTO availability VALUES(
              '$formatted_start_date',
              '$formatted_end_date',
              '$_POST[type_of_pet]',
              '$_POST[caretaker]',
              '$_POST[min_bid]',
              'false',
              '$_POST[remark]')";

    $result = pg_query($db, $query)
                or die('Add failed.');

    echo "SUCCESS!";
  } else {
    echo "ERROR!";
  }
?>
