<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="add_bid" action="basic_add_bid.php" method="post">
    <li>Price (Integer):</li>
    <li><input type="number" name="price"/></li>
    <li>Bidder (email): </li>
    <li><input type="text" name="bidder" /></li>
    <li>Caretaker (email):</li>
    <li><input type="text" name="caretaker" /></li>
    <li>Start date (YYYY-MM-DD):</li>
    <li><input type="text" name="start_date" /></li>
    <li>End date (YYYY-MM-DD):</li>
    <li><input type="text" name="end_date" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
      // Connect to the database -- remember to change the db name and password accordingly!!
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=xujun0710")
                  or die('Could not connect: ' . pg_last_error($db));

      // Add account function
      if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO bid VALUES(
                  '$_POST[price]',
                  '$_POST[bidder]',
                  '$_POST[caretaker]',
                  '$_POST[start_date]',
                  '$_POST[end_date]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
