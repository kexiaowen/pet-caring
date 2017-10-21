<!DOCTYPE html>  
<head>
  <title>login</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    body{
      font-family:sans-serif;
      background:url(img/homepage_cat.jpg);
      background-size:cover;
      margin:0;
    }
    input{
      width:70%;
      outline:none;
      padding:10px 11px;
      border: 1px #aaa solid;
      border-radius: 4px;
      font size:15px;
      background:#fff;
      display:block;
      margin:20px auto;
    }
    #login{
      background: #19b1ca;
      color:#fff;
      border:none;
    }
    div {
      width:30%;
      height:400px;
      background: rgba(0,0,0,.2);
      box-shadow: 5px 4px 43px #000;
      position:absolute;
      top:80px;
      left:200px;
    }
    form{
      margin:30px auto;
      text-align:center;

    }
    b{
      font-size:25px;
      color:#fff;
    }
    a{
      color:#fff;
    }
    img{
      display:block;
      margin:-75px auto 0 auto;
    }
  </style>
</head>
<body>
    <?php
    // Connect to the database. Please change the password in the following line accordingly
    require_once 'config.php';
    $result = pg_query($db, "SELECT * FROM account where email = '$_POST[email]'");     // Query template
    $row    = pg_fetch_assoc($result);      // To store the result row
    if (isset($_POST['submit'])) {
      if (trim($_POST[email])==null) $err = 'Please enter email';
      else if (trim($_POST[password])==null) $err='Please enter password';
      else if ($row[email]==null) $err = 'Invalid user';
      else if ($row[password]<>$_POST[password]) $err = 'Invalid password';
      else {
            session_start();
            $_SESSION[email] = $row[email];
            header("location: index.php");
         }
    }
    ?>  
  <div>
    <form name="display" action="login.php" method="POST" >
      <b>Login</b>
      <br><br>
      <a>New user?</a>
      <a href="signup.php" style="color:#42A5F5">Sign up here</a>
      <input type="email" name="email" value="<?php echo $_POST[email]; ?>" placeholder="Email" id="" />
      <input type="password" name="password" value="" placeholder="Password" id="  " />
      <input type="submit" style="background:#42A5F5; color:#fff" name="submit" value = "LOGIN"/>
      <a href="index.php">Return to home page</a><br>
      <a style="color:#e51c23"><?php echo $err; ?></a>
      <br>
    </form>
  </div>
</body>
</html>