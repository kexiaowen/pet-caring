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
        <h3 class="light-blue-text text-darken-4">Account</h3>
        <?php
          if (!isset($_POST["create-form"])) {
            echo "<form name='create-form' action='admin_account.php' method='POST'>
              <button type='submit' name='create-form' class='btn waves-effect waves-light light-blue darken-4'>Add a new account</button>
            </form>";
          }
         ?>
        <?php
          if(isset($_POST["create-form"])){
            echo "<form name='create' action='admin_create_account.php' method='POST'>
              <div class='input-field col s6'>
                <input type='text' name='name' placeholder='Name'>
                <label for='name'>Name</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='email' placeholder='Email'>
                <label for='email'>Email</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='password' placeholder='Password'>
                <label for='password'>Password</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='region' placeholder='Region'>
                <label for='region'>Region</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='address' placeholder='Address'>
                <label for='address'>Address</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='postal_code' placeholder='Postal code'>
                <label for='postal_code'>Postal code</label>
              </div>
              <button type='submit' name='create' class='btn waves-effect waves-light green'>Submit</button>
            </form>";
          }
        ?>
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
                    FROM account
                    ORDER BY name ASC";
            $result = pg_query($db, $sql);
            $counter = 0;
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

                echo "
                <div class = 'edit'>
                  <td align='center'>
                    <form name='edit$counter' action='admin_account.php' method='POST'>
                      <input type='hidden' name='name' value='$name'>
                      <input type='hidden' name='email' value='$email'>
                      <input type='hidden' name='password' value='$password'>
                      <input type='hidden' name='region' value='$region'>
                      <input type='hidden' name='address' value='$address'>
                      <input type='hidden' name='postal_code' value='$postal_code'>

                      <button type='submit' name='edit$counter' class='btn waves-effect waves-light green'>Edit</button>
                    </form>
                  </td>
                </div>";
                if (isset($_POST["edit$counter"])) {
                  echo "
                    <form name='edit' action='admin_update_account.php' method='POST'>
                      <div class='input-field col s6'>
                        <input type='text' name='name' value='$name' placeholder='Name'>
                        <label for='name'>Name</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_email' value='$email' placeholder='Email'>
                        <label for='new_email'>Email</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='password' value='$password' placeholder='Password'>
                        <label for='password'>Password</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='region' value='$region' placeholder='Region'>
                        <label for='region'>Region</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='address' value='$address' placeholder='Address'>
                        <label for='address'>Address</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='postal_code' value='$postal_code' placeholder='Postal code'>
                        <label for='postal_code'>Postal code</label>
                      </div>
                      <input type='hidden' name='email' value='$email'>
                      <button type='submit' name='edit' class='btn waves-effect waves-light green'>Submit</button>
                    </form>
                  ";
                }

                echo "
                  <td align='center'>
                    <form name='delete' method='POST' action='admin_delete_account.php'>
                      <input type='hidden' name='email' value='$email'>
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
