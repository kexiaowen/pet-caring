<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="basic_add_account" action="basic_add_account.php" method="post">
    <li>Name:</li>
    <li><input type="text" name="name"/></li>
    <li>Email:</li>
    <li><input type="text" name="email" /></li>
    <li>Password:</li>
    <li><input type="password" name="password" /></li>
    <li>Region:</li>
    <li><input type="text" name="region" /></li>
    <li>Address:</li>
    <li><input type="text" name="address" /></li>
    <li>Postal code:</li>
    <li><input type="text" name="postal_code" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
     // Connect to the database -- remember to change the db name and password accordingly!!
    $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
              or die('Could not connect: ' . pg_last_error($db));

    // Add account function
    if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO account VALUES(
                  '$_POST[name]',
                  '$_POST[email]',
                  '$_POST[password]',
                  '$_POST[region]',
                  '$_POST[address]',
                  '$_POST[postal_code]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
