<?php
  session_start();
  if(!isset($_SESSION[admin_username]) || empty($_SESSION[admin_username]))
     header("location: admin_login.php");
 ?>
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
        color: #F8F9FB;
        border-color: #e0e0e0;
      }
      .link {
        font-size: 20px;
        padding-left: 10px;
      }
      .admin-title {
        padding: 0px;
        opacity: 0.8;
      }
      .page-content {
        overflow-y: scroll;
        height: 750px;
      }
  </style>
</head>
<body>
  <div class="row">

      <div class="col s2 sidenav">
        <!-- navigation panel -->
        <h3 class="white-text light-blue darken-4 light center admin-title">Admin</h3>
        <h5 class="light"><a href="admin_account.php" class="light-blue-text text-darken-4 light link">Account</a></h5>
        <h5 class="light"><a href="admin_pet.php" class="light-blue-text text-darken-4 light link">Pet</a></h5>
        <h5 class="light"><a href="admin_availability.php" class="light-blue-text text-darken-4 light link">Availability</a></h5>
        <h5 class="light"><a href="admin_bid.php" class="light-blue-text text-darken-4 light link">Bid</a></h5>
        <h5 class="light"><a href="admin_logout.php" class="light-blue-text text-darken-4 light link">Log out</a></h5>
      </div>

      <div class="col s10 page-content">
        <!-- Teal page content  -->
        <h3 class="light-blue-text text-darken-4">Pet</h3>
        <?php
          if (!isset($_POST["create-form"])) {
            echo "<form name='create-form' action='admin_pet.php' method='POST'>
              <button type='submit' name='create-form' class='btn waves-effect waves-light light-blue darken-4'>Add a new pet</button>
            </form>";
          }
         ?>
        <?php
          if(isset($_POST["create-form"])){
            echo "<form name='create' action='admin_create_pet.php' method='POST'>
              <div class='input-field col s6'>
                <input type='text' name='pet_name' placeholder='Pet name'>
                <label for='pet_name'>Pet name</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='type' placeholder='Type'>
                <label for='type'>Type</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='species' placeholder='Species'>
                <label for='species'>Species</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='dob' placeholder='Date of birth'>
                <label for='dob'>Date of birth</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='size' placeholder='Size'>
                <label for='size'>Size</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='owner' placeholder='Owner'>
                <label for='owner'>Owner</label>
              </div>
              <button type='submit' name='create' class='btn waves-effect waves-light green'>Submit</button>
            </form>";
          }
        ?>
        <table style="width:100%" class="highlight">
          <thead>
            <tr>
              <th class="light-blue-text text-darken-4">Pet name</th>
              <th class="light-blue-text text-darken-4">Type</th>
              <th class="light-blue-text text-darken-4">Species</th>
              <th class="light-blue-text text-darken-4">Date of birth</th>
              <th class="light-blue-text text-darken-4">Size</th>
              <th class="light-blue-text text-darken-4">Owner</th>
            </tr>
          </thead>
          <div id="message">
            <?php
            	if(isset($_GET["msg"])){
            		echo '<h5 class="light-blue-text text-darken-4">' . $_GET["msg"] . '</h5>';
            	}
            ?>
				  </div>

          <?php
            require_once 'config.php';
            $sql = "SELECT *
                    FROM pet
                    ORDER BY pet_name ASC";
            $result = pg_query($db, $sql);
            $counter = 0;
            // Create  while loop and loop through result set
            while($row = pg_fetch_assoc($result)){
              $pet_name    = $row['pet_name'];
              $type  = $row['type'];
              $species = $row['species'];
              $dob = $row['dob'];
              $size = $row['size'];
              $owner = $row['owner'];

              echo "<tr>";
                echo "<td align='center'>" .$pet_name . "</td>";
                echo "<td align='center'>" .$type . "</td>";
                echo "<td align='center'>" .$species . "</td>";
                echo "<td align='center'>" .$dob . "</td>";
                echo "<td align='center'>" .$size . "</td>";
                echo "<td align='center'>" .$owner . "</td>";

                echo "
                <div class = 'edit'>
                  <td align='center'>
                    <form name='edit$counter' action='admin_pet.php' method='POST'>
                      <input type='hidden' name='pet_name' value='$pet_name'>
                      <input type='hidden' name='type' value='$type'>
                      <input type='hidden' name='species' value='$species'>
                      <input type='hidden' name='dob' value='$dob'>
                      <input type='hidden' name='size' value='$size'>
                      <input type='hidden' name='owner' value='$owner'>

                      <button type='submit' name='edit$counter' class='btn waves-effect waves-light green'>Edit</button>
                    </form>
                  </td>
                </div>";
                if (isset($_POST["edit$counter"])) {
                  echo "
                    <form name='edit' action='admin_update_pet.php' method='POST'>
                      <div class='input-field col s6'>
                        <input type='text' name='new_pet_name' value='$pet_name' placeholder='Pet name'>
                        <label for='new_pet_name'>Pet name</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='type' value='$type' placeholder='Type'>
                        <label for='type'>Type</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='species' value='$species' placeholder='Species'>
                        <label for='species'>Species</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='dob' value='$dob' placeholder='Date of birth'>
                        <label for='dob'>Date of birth</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='size' value='$size' placeholder='Size'>
                        <label for='size'>Size</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_owner' value='$owner' placeholder='Owner'>
                        <label for='new_owner'>Owner</label>
                      </div>
                      <input type='hidden' name='pet_name' value='$pet_name'>
                      <input type='hidden' name='owner' value='$owner'>
                      <button type='submit' name='edit' class='btn waves-effect waves-light green'>Submit</button>
                    </form>
                  ";
                }

                echo "
                  <td align='center'>
                    <form name='delete' method='POST' action='admin_delete_pet.php'>
                      <input type='hidden' name='pet_name' value='$pet_name'>
                      <input type='hidden' name='owner' value='$owner'>
                      <button type='submit' name='delete' class='btn waves-effect waves-light red'>Delete</button>
                    </form>
                  </td>
                ";

                echo "</tr>";

                $counter = $counter + 1;
            }
          ?>
        </table>
      </div>

    </div>

  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
          Materialize.updateTextFields();
        });
  </script>
</body>
</html>
