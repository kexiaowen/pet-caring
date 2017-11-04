<?php
  session_start();
  if(!isset($_SESSION[email]) || empty($_SESSION[email]))
    include('headerN.php');
  else include ('headerHi.php');
?>
<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- Import custom stylesheet for search page -->
  <link rel="stylesheet" href="css/my_pets.css">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>

  </style>
</head>
<body>
  <a class="waves-effect waves-light btn light-blue" href="add_pet.php" id="add-pet">Add new pet</a>
  <div class="container">
      <h3 class="light-blue-text text-lighten-1 light center">Manage my pets</h3>
    <?php
      require_once 'config.php';
      $sql = "SELECT *
              FROM pet
              WHERE owner = '$_SESSION[email]'
              ORDER BY dob ASC";
      $result = pg_query($db, $sql);

      if (pg_num_rows($result) == 0) {
        echo "<h5 class=\"center\">You have not added any pets! How about adding one now?</h5>";
      }

      // Create  while loop and loop through result set
      while($row = pg_fetch_assoc($result)) {
        $owner = $_SESSION['email'];
        $pet_name  = $row['pet_name'];
        $type_of_pet  = $row['type'];
        $species = $row['species'];
        $dob = $row['dob'];
        $size = $row['size'];

        $query = "SELECT count(*) as total
                  FROM bid
                  WHERE bidder = '$owner' AND pet_name = '$pet_name'";
        $res = pg_query($db, $query);
        $bid_row = pg_fetch_assoc($res);
        $bidder_num = $bid_row['total'];

        echo "<div class=\"card hoverable small\">
          <div class=\"card-content\">
            <div class=\"row\">";
            if ($bidder_num > 0) {
              echo "
                <a href=\"my_bids.php\"><span class=\"new badge rounded red darken-2\" data-badge-caption=\"Can no longer be edited/deleted\"></span></a>";
            } else {
              echo "
                <a href=\"delete_pet.php?owner=$owner&pet_name=$pet_name\"><i class=\"material-icons right delete\">delete</i></a>
                <a href=\"edit_pet.php?owner=$owner&pet_name=$pet_name&type_of_pet=$type_of_pet&species=$species&dob=$dob&size=$size\"><i class=\"material-icons right edit\">mode_edit</i></a>";
            }
            echo "
            </div>
            <div class=\"row\">
              <div class=\"col s3 \">
                <img src=\"img/$type_of_pet.jpg\" class=\"circle\" height=\"200\">
              </div>

              <div class=\"col s4 offset-s2\">

                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Pet name:
                  <span class=\"grey-text text-darken-2 text-size light\">$pet_name
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Pet type:
                  <span class=\"grey-text text-darken-2 text-size light\">$type_of_pet
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Pet species:
                  <span class=\"grey-text text-darken-2 text-size light\">$species
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Date of birth:
                  <span class=\"grey-text text-darken-2 text-size light\">$dob
                </p>
                <p>
                  <span class=\"light-blue-text text-darken-2 text-size light\">Pet size:
                  <span class=\"grey-text text-darken-2 text-size light\">$size
              </div>
            </div>
          </div>
        </div>";
      }
    ?>
  </div>
</body>
</html>
