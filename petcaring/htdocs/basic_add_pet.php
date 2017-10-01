<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>

<body>

  <form id="add_pet" action="basic_add_pet.php" method="post">
    <li>Pet name:</li>
    <li><input type="text" name="name"/></li>
    <li>Type of pet (dog/cat/hamster/rabbit/bird):</li>
    <li><input type="text" name="type_of_pet" /></li>
    <li>Species:</li>
    <li><input type="text" name="species" /></li>
    <li>D.O.B.(YYYY-MM-DD):</li>
    <li><input type="text" name="dob" /></li>
    <li>Size (small/medium/large/giant):</li>
    <li><input type="text" name="size" /></li>
    <li>Owner (email):</li>
    <li><input type="text" name="owner" /></li>
    <li><input type="submit" name="submitadd" /></li>
  </form>

  <?php
      // Connect to the database -- remember to change the db name and password accordingly!!
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
                  or die('Could not connect: ' . pg_last_error($db));

      // Add account function
      if (isset($_POST['submitadd'])) {
      $query = "INSERT INTO pet VALUES(
                  '$_POST[name]',
                  '$_POST[type_of_pet]',
                  '$_POST[species]',
                  '$_POST[dob]',
                  '$_POST[size]',
                  '$_POST[owner]')";
      $result = pg_query($db, $query)
                  or die('Add query failed: ' . pg_last_error($db));

      echo "Add succeeded!";
    }
  ?>
</body>
</html>
