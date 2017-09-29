<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="add_availability" action="add_availability.php" method="post">
    <li>Start date (YYYY-MM-DD):</li>
    <li><input type="text" name="start_date_updated"/></li>
    <li>End date (YYYY-MM-DD):</li>
    <li><input type="text" name="end_date_updated" /></li>
    <li>Type of pet (dog/cat/hamster/rabbit/bird):</li>
    <li><input type="text" name="type_of_pet_updated" /></li>
    <li>Caretaker (email):</li>
    <li><input type="text" name="caretaker_updated" /></li>
    <li>Minimum bid:</li>
    <li><input type="text" name="min_bid_updated" /></li>
    <li>Accepted bid (true/false):</li>
    <li><input type="boolean" name="accepted_bid_updated" /></li>
    <li>Remark:</li>
    <li><input type="text" name="remark_updated" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
      // Connect to the database -- remember to change the db name and password accordingly!!
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
                  or die('Could not connect: ' . pg_last_error($db));

      // Add account function
      if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO availability VALUES(
                  '$_POST[start_date_updated]',
                  '$_POST[end_date_updated]',
                  '$_POST[type_of_pet_updated]',
                  '$_POST[caretaker_updated]',
                  '$_POST[min_bid_updated]',
                  '$_POST[accepted_bid_updated]',
                  '$_POST[remark_updated]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
