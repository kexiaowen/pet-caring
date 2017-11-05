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
        <h3 class="light-blue-text text-darken-4">Bid</h3>
        <?php
          if (!isset($_POST["create-form"])) {
            echo "<form name='create-form' action='admin_bid.php' method='POST'>
              <button type='submit' name='create-form' class='btn waves-effect waves-light light-blue darken-4'>Add a new bid</button>
            </form>";
          }
         ?>

        <?php
          if(isset($_POST["create-form"])){
            echo "<form name='create' action='admin_create_bid.php' method='POST'>
              <div class='input-field col s6'>
                <input type='text' name='caretaker' placeholder='Caretaker'>
                <label for='caretaker'>Caretaker</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='bidder' placeholder='Bidder'>
                <label for='bidder'>Bidder</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='start_date' placeholder='Start date'>
                <label for='end_date'>Start date</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='end_date' placeholder='End date'>
                <label for='end_date'>End date</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='pet_name' placeholder='Pet name'>
                <label for='pet_name'>Pet name</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='price' placeholder='Price'>
                <label for='price'>Price</label>
              </div>
              <div class='input-field col s6'>
                <input type='text' name='accepted_bid' placeholder='Accepted bid?'>
                <label for='accepted_bid'>Accepted bid?</label>
              </div>
              <button type='submit' name='create' class='btn waves-effect waves-light green'>Submit</button>
            </form>";
          }
        ?>
        <table style="width:100%" class="highlight">
          <thead>
            <tr>
              <th class="light-blue-text text-darken-4">Caretaker</th>
              <th class="light-blue-text text-darken-4">Bidder</th>
              <th class="light-blue-text text-darken-4">Start date</th>
              <th class="light-blue-text text-darken-4">End date</th>
              <th class="light-blue-text text-darken-4">Pet name</th>
              <th class="light-blue-text text-darken-4">Price</th>
              <th class="light-blue-text text-darken-4">Accepted bid</th>
              <th class="light-blue-text text-darken-4"></th>
              <th class="light-blue-text text-darken-4"></th>
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
                    FROM bid
                    ORDER BY caretaker ASC, bidder ASC, start_date ASC";
            $result = pg_query($db, $sql);
            $counter = 0;
            // Create  while loop and loop through result set
            while($row = pg_fetch_assoc($result)){
              $price    = $row['price'];
              $accepted_bid  = $row['accepted_bid'];
              $bidder = $row['bidder'];
              $caretaker = $row['caretaker'];
              $pet_name = $row['pet_name'];
              $start_date = $row['start_date'];
              $end_date = $row['end_date'];

              echo "<tr>";
                echo "<td align='center'>" .$caretaker . "</td>";
                echo "<td align='center'>" .$bidder . "</td>";
                echo "<td align='center'>" .$start_date . "</td>";
                echo "<td align='center'>" .$end_date . "</td>";
                echo "<td align='center'>" .$pet_name . "</td>";
                echo "<td align='center'>" .$price . "</td>";
                if ($accepted_bid == "t") {
                  echo "<td align='center'> true </td>";
                } else {
                  echo "<td align='center'> false </td>";
                }

                echo "
                <div class = 'edit'>
                  <td align='center'>
                    <form name='edit$counter' action='admin_bid.php' method='POST'>
                      <input type='hidden' name='caretaker' value='$caretaker'>
                      <input type='hidden' name='bidder' value='$bidder'>
                      <input type='hidden' name='start_date' value='$start_date'>
                      <input type='hidden' name='end_date' value='$end_date'>
                      <input type='hidden' name='pet_name' value='$pet_name'>
                      <input type='hidden' name='price' value='$price'>
                      <input type='hidden' name='accepted_bid' value='$accepted_bid'>

                      <button type='submit' name='edit$counter' class='btn waves-effect waves-light green'>Edit</button>
                    </form>
                  </td>
                </div>";
                if (isset($_POST["edit$counter"])) {
                  echo "
                    <form name='edit' action='admin_update_bid.php' method='POST'>
                      <div class='input-field col s6'>
                        <input type='text' name='new_caretaker' value='$caretaker' placeholder='Caretaker'>
                        <label for='new_caretaker'>Caretaker</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_bidder' value='$bidder' placeholder='Bidder'>
                        <label for='new_bidder'>Bidder</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_start_date' value='$start_date' placeholder='Start date'>
                        <label for='new_start_date'>Start date</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_end_date' value='$end_date' placeholder='End date'>
                        <label for='new_end_date'>End date</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='new_pet_name' value='$pet_name' placeholder='Pet name'>
                        <label for='new_pet_name'>Pet name</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='price' value='$price' placeholder='Price'>
                        <label for='price'>Price</label>
                      </div>
                      <div class='input-field col s6'>
                        <input type='text' name='accepted_bid' value='$accepted_bid' placeholder='Accepted bid?'>
                        <label for='accepted_bid'>Accepted bid?</label>
                      </div>
                      <input type='hidden' name='caretaker' value='$caretaker'>
                      <input type='hidden' name='bidder' value='$bidder'>
                      <input type='hidden' name='start_date' value='$start_date'>
                      <input type='hidden' name='end_date' value='$end_date'>
                      <input type='hidden' name='pet_name' value='$pet_name'>
                      <button type='submit' name='edit' class='btn waves-effect waves-light green'>Submit</button>
                    </form>
                  ";
                }

                echo "
                  <td align='center'>
                    <form name='delete' method='POST' action='admin_delete_bid.php'>
                      <input type='hidden' name='caretaker' value='$caretaker'>
                      <input type='hidden' name='bidder' value='$bidder'>
                      <input type='hidden' name='start_date' value='$start_date'>
                      <input type='hidden' name='end_date' value='$end_date'>
                      <input type='hidden' name='pet_name' value='$pet_name'>
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
