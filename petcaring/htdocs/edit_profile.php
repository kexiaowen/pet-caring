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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
  form{
      margin:30px 100px;
      text-align:center;
    }
  </style>
</head>
<body>
  <?php
      require_once 'config.php';
      $sql = "SELECT *
              FROM account
              WHERE email = '$_SESSION[email]' ";
      $result = pg_query($db, $sql);
      $row    = pg_fetch_assoc($result);   

      $_SESSION[name]  = $row[name];
      $_SESSION[region] = $row[region];
      $_SESSION[address] = $row[address];
      $_SESSION[postal_code] = $row[postal_code];
  ?>
  <h3 class="light-blue-text text-lighten-1 center avail-header">My profile</h3>
  <form class="col s12" method="POST">
    <div class="row">
             <div class="col s4">
              <p><label><i class=""></i> Email:</label></p>
              <input class="w3-input w3-border active" type="text" name="email" disabled value="<?php echo $_SESSION[email]?>"/>
             </div>
              
           <div class="col s4">
              <p><label><i class=""></i> Name:</label></p>
              <input class="w3-input w3-border active" type="text" name="name" value="<?php echo $_SESSION[name]?>"/>
            </div>
            
            <div class="col s4">
              <p><label><i class=""></i> Region:</label></p>
              <div class="w3-input-field w3-border-top w3-border-left w3-border-right">
                <select name="region" id="region">
                  <option value="<?php echo $_SESSION[region]?>" selected><?php echo $_SESSION[region]?></option>
                  <option value="West">West</option>
                  <option value="East">East</option>
                  <option value="North">North</option>
                  <option value="South">South</option>
                </select>
              </div>
            </div>
    </div>

      <div class="row">
            <div class="col s4">
              <p><label><i class=""></i> Address:</label></p>
              <input class="w3-input w3-border active" type="text" name="address" value="<?php echo $_SESSION[address]?>"/>
            </div>

            <div class="col s4">
              <p><label><i class=""></i> Postal Code:</label></p>
              <input class="w3-input w3-border active" type="text" name="postal_code" value="<?php echo $_SESSION[postal_code]?>"/>
            </div>
      </div>

      <div class="row">
        <div class="center-align">
          <input class="waves-effect waves-light btn light-blue" type="submit" name ="submit"/> 
        </div>
      </div>
  
  </form>
  <?php
    require_once 'config.php';
    if (isset($_POST['submit'])) {
      if ($_POST[postal_code]==''|| $_POST[name]=='' || $_POST[address]=='') echo "empty area founded";
      else if (!is_numeric($_POST[postal_code])) echo "Invalid postal code";
      else {
        $result = pg_query($db, "UPDATE account SET name = '$_POST[name]',  
   region = '$_POST[region]',address = '$_POST[address]',  
    postal_code = '$_POST[postal_code]' where email = '$_SESSION[email]'");
        if (!$result) {
            echo "Update failed!!";
        } else {
              $_SESSION[name]  = $_POST[name];
              $_SESSION[region] = $_POST[region];
              $_SESSION[address] = $_POST[address];
              $_SESSION[postal_code] = $_POST[postal_code];
              echo "Update successful!";
              header("location:profile.php");   
        }
    }
  }
    ?>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/edit_pet.js"></script>  
</body>
</html>
