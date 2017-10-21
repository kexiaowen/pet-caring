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
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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