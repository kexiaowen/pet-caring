<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <form id="search" action="basic_search.php" method="post">
    <li>Start Date (YYYY-MM-DD):</li>
    <li><input type="text" name="start_date"/></li>
    <li>End Date (YYYY-MM-DD):</li>
    <li><input type="text" name="end_date" /></li>
    <li>Type of pet (dog/cat/hamster/rabbit/bird):</li>
    <li><input type="text" name="type_of_pet" /></li>
    <li>Minimum bid:</li>
    <li><input type="number" name="min_bid" /></li>
    <li>Maximum bid:</li>
    <li><input type="number" name="max_bid" /></li>
    <li><input type="submit" name="submit" /></li>
  </form>

  <table style="width:100%">
    <tr>
      <th>Name</th>
      <th>Region</th>
      <th>Address</th>
      <th>Minimum bid required</th>
    </tr>
    <?php

      // Connect to the database
      $db     = pg_connect("host=localhost port=5432 dbname=petcaring user=postgres password=123beanbong")
                  or die('Could not connect: ' . pg_last_error($db));;

      if (isset($_POST['submit'])) {
        $query = "SELECT acc.name, acc.region, acc.address, avail.min_bid
                    FROM account AS acc, availability AS avail
                    WHERE acc.email = avail.caretaker
                    AND avail.start_date <= '$_POST[start_date]'
                    AND avail.end_date >= '$_POST[end_date]'
                    AND avail.type_of_pet = '$_POST[type_of_pet]'
                    AND avail.min_bid <= '$_POST[max_bid]'
                    AND avail.acceptedBid = 'false'";

        $result = pg_query($db, $query)
                    or die('Search query failed: ' . pg_last_error($db));

        // Create  while loop and loop through result set
    	while($row = pg_fetch_assoc($result)){
	      $name    = $row['name'];
          $region  = $row['region'];
          $address = $row['address'];
          $min_bid = $row['min_bid'];

          // Display the result of the array
          echo "<tr>";
          	echo "<td align='center'>" .$name . "</td>";
            echo "<td align='center'>" .$region . "</td>";
            echo "<td align='center'>" .$address . "</td>";
            echo "<td align='center'>" .$min_bid . "</td>";
          echo "</tr>";
    	}
      }
    ?>
  </table>
</body>
</html>
