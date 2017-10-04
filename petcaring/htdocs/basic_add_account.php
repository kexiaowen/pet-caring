<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="basic_add_account" action="basic_add_account.php" method="post">
    <li>Name:</li>
    <li><input type="text" name="name_updated"/></li>
    <li>Email:</li>
    <li><input type="text" name="email_updated" /></li>
    <li>Password:</li>
    <li><input type="password" name="password_updated" /></li>
    <li>Region:</li>
    <li><input type="text" name="region_updated" /></li>
    <li>Address:</li>
    <li><input type="text" name="address_updated" /></li>
    <li>Postal code:</li>
    <li><input type="text" name="postal_code_updated" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
     // Connect to the database -- remember to change the db name and password accordingly!!
    $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=xujun0710")
              or die('Could not connect: ' . pg_last_error($db));

    // Add account function
    if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO account VALUES(
                  '$_POST[name_updated]',
                  '$_POST[email_updated]',
                  '$_POST[password_updated]',
                  '$_POST[region_updated]',
                  '$_POST[address_updated]',
                  '$_POST[postal_code_updated]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
