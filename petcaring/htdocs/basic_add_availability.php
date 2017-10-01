<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="add_availability" action="basic_add_availability.php" method="post">
    <li>Start date (YYYY-MM-DD):</li>
    <li><input type="text" name="start_date"/></li>
    <li>End date (YYYY-MM-DD):</li>
    <li><input type="text" name="end_date" /></li>
    <li>Type of pet (dog/cat/hamster/rabbit/bird):</li>
    <li><input type="text" name="type_of_pet" /></li>
    <li>Caretaker (email):</li>
    <li><input type="text" name="caretaker" /></li>
    <li>Minimum bid:</li>
    <li><input type="text" name="min_bid" /></li>
    <li>Remark:</li>
    <li><input type="text" name="remark" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
      // Connect to the database -- remember to change the db name and password accordingly!!
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
                  or die('Could not connect: ' . pg_last_error($db));

      // Add account function
      if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO availability VALUES(
                  '$_POST[start_date]',
                  '$_POST[end_date]',
                  '$_POST[type_of_pet]',
                  '$_POST[caretaker]',
                  '$_POST[min_bid]',
                  'false',
                  '$_POST[remark]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
