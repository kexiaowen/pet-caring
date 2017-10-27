<?php
// Initialize the session
session_start();
require_once 'config.php';
$result = pg_query($db, "SELECT name FROM account where email = '$_SESSION[email]'");
$row    = pg_fetch_assoc($result);
$_SESSION[name] = $row[name];

// If session variable is not set it will redirect to login page
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
  <style type="text/css">
    body{ font: 14px sans-serif; text-align: center; }
  </style>
</head>
<body>
    <nav class="light-blue lighten-1" role="navigation"> 
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="left:0%">Pet Caring</a>
      <ul class="right">
        <li><a href="index.php">Home</a></li>
        <li><a>Hi,<?php echo $_SESSION[name]; ?></a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="myPet.php">My Pet</a></li>
        <li><a href="myAvailability.php">My Availability</a></li>
        <li><a href="myBid.php">My bid</a></li>
        <li><a href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </nav>
    
</body>
</html>