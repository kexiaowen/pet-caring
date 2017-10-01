<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Pet Caring</a>
      <ul class="right">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="signup.php">Sign up</a></li>
      </ul>
    </div>
  </nav>

  <h3 class="light-blue-text text-lighten-1 center header-padding">Add a user account</h3>

  <div class="w3-container w3-display-container">
    <form id="add_account" action="add_account.php" method="post">
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-name"></i> Name:</label></p>
      		<!--<input class="w3-input w3-border datepicker" type="text" placeholder="YYYY/MM/DD" name="startdate" required>-->
          <input class="w3-input w3-border" type="text" placeholder=" Your name here" name="name"/>
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-email"></i> Email:</label></p>
      		<input class="w3-input w3-border" type="text" placeholder=" Your email here" name="email"/>
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-password"></i> Password:</label></p>
          <input class="w3-input w3-border" type="password" placeholder=" Your password here" name="password"/>
        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <p><label><i class="fa fa-region"></i> Region:</label></p>
          <input class="w3-input w3-border" type="text" placeholder = " North/South/East/West" name="region">
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-address"></i> Address:</label></p>
          <input class="w3-input w3-border" type="text" placeholder = " Your address here" name="address">
        </div>
        <div class="col s4">
          <p><label><i class="fa fa-postal-code"></i> Maximum bid:</label></p>
          <input class="w3-input w3-border" type="number" placeholder = " 6-digits postal code" name="postal_code">
        </div>

      </div>
      <div class="row">
        <div class="col s4 offset-s4 center">
          <button class="btn waves-effect waves-light light-blue lighten-2 center-align add-account" type="submit" name="submitadd">Add account
            <i class="material-icons right"></i>
          </button>
        </div>
      </div>
      <!--<p><button class="w3-button w3-block w3-green w3-left-align" type="submit" name="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></p>-->
    </form>
  </div>

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

        echo "Add succeeded! *8)";
      }
    ?>
  </table>
</body>
</html>
