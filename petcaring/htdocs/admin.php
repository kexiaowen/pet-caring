<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
      .sidenav {
        height: 800px;
      }
      .link {
        font-size: 20px;
        padding-left: 10px;
      }
      .admin-title {
        padding: 0px;
        opacity: 0.8;
      }
  </style>
</head>
<body>
  <div class="row">

      <div class="grey darken-1 col s2 sidenav">
        <!-- navigation panel -->
        <h3 class="white-text light-blue darken-4 light center admin-title">Admin</h3>
        <h5 class="light"><a href="admin_account.php" class="white-text light link">Account</a></h5>
        <h5 class="light"><a href="admin_pet.php" class="white-text light link">Pet</a></h5>
        <h5 class="light"><a href="admin_availability.php" class="white-text light link">Availability</a></h5>
        <h5 class="light"><a href="admin_bid.php" class="white-text light link">Bid</a></h5>
        <h5 class="light"><a href="#" class="white-text light link">Log out</a></h5>
      </div>

      <div class="col s10">
        <!-- Teal page content  -->
        <table style="width:100%" class="highlight">
          <thead>
            <tr>
              <th class="light-blue-text text-darken-4">Name</th>
              <th class="light-blue-text text-darken-4">Email</th>
              <th class="light-blue-text text-darken-4">Password</th>
              <th class="light-blue-text text-darken-4">Region</th>
              <th class="light-blue-text text-darken-4">Address</th>
              <th class="light-blue-text text-darken-4">Postal code</th>
            </tr>
          </thead>
          <?php
            require_once 'config.php';
            $sql = "SELECT *
                    FROM account
                    ORDER BY name ASC";
            $result = pg_query($db, $sql);
            // Create  while loop and loop through result set
            while($row = pg_fetch_assoc($result)){
              $name    = $row['name'];
              $email  = $row['email'];
              $password = $row['password'];
              $region = $row['region'];
              $address = $row['address'];
              $postal_code = $row['postal_code'];

              echo "<tr>";
              	echo "<td align='center'>" .$name . "</td>";
                echo "<td align='center'>" .$email . "</td>";
                echo "<td align='center'>" .$password . "</td>";
                echo "<td align='center'>" .$region . "</td>";
                echo "<td align='center'>" .$address . "</td>";
                echo "<td align='center'>" .$postal_code . "</td>";

                echo "<td align='center'><a href='#'>Edit</a></td>";
                echo "<td align='center'><a href='#'>Delete</a></td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>

    </div>

  </div>
</body>
</html>
