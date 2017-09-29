<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <form id="search" action="basic_search.php" method="post">
    <li>Start Date:</li>
    <li><input type="text" name="startdate"/></li>
    <li>End Date:</li>
    <li><input type="text" name="enddate" /></li>
    <li>Type of pet:</li>
    <li><input type="text" name="type" /></li>
    <li>Minimum bid:</li>
    <li><input type="text" name="minbid" /></li>
    <li>Maximum bid:</li>
    <li><input type="text" name="maxbid" /></li>
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
      if (isset($_POST['submit'])) {
        // Connect to the database
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=361023");
        // Run the query
        // ******** NEED MODIFY THE query
        // CHECK START DATE, END DATE AND MIN BID etc!!!
        $result = pg_query($db, "SELECT acc.name, acc.region, acc.address, avail.min_bid FROM availability as avail, account as acc where acc.email = avail.caretaker AND  type_of_pet = '$_POST[type]'");

        //-create  while loop and loop through result set
    	  while($row=pg_fetch_assoc($result)){
     	          $name  =$row['name'];
    	          $region=$row['region'];
    	          $address=$row['address'];
                $min_bid=$row['min_bid'];
    	  //-display the result of the array
        echo "<tr>";
      	  echo "<td>" .$name . "</td>";
          echo "<td>" .$region . "</td>";
          echo "<td>" .$address . "</td>";
          echo "<td>" .$min_bid . "</td>";
        echo "</tr>";
    	  }
      }
    ?>
  </table>
</body>
</html>
