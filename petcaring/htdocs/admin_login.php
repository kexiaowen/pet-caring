<!DOCTYPE html>
<head>
  <title>Pet Caring</title>
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
    b {
      font-size:25px;
      color:#fff;
    }
    a{
      color:#fff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: none;
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
    $result = pg_query($db, "SELECT * FROM admin where user_name = '$_POST[user_name]'");     // Query template
    $row    = pg_fetch_assoc($result);      // To store the result row
    if (isset($_POST['submit'])) {
      if (trim($_POST[user_name])==null) $err = 'Please enter admin username';
      else if (trim($_POST[user_pass])==null) $err='Please enter admin password';
      else if ($row[user_name]==null) $err = 'Admin account does not exist';
      else if ($row[user_pass]<>$_POST[user_pass]) $err = 'Invalid password';
      else {
            session_start();
            $_SESSION[admin_username] = $row[user_name];
            header("location: admin_account.php");
         }
    }
    ?>
  <div>
    <form name="display" action="admin_login.php" method="POST" >
      <b>Admin Login</b>
      <br><br>
      <input type="text" name="user_name" placeholder="Admin Username" />
      <input type="password" name="user_pass" placeholder="Admin Password" />
      <input type="submit" style="background:#42A5F5; color:#fff" name="submit" value = "LOGIN"/>
      <a href="index.php">Return to home page</a><br>
      <a style="color:#e51c23"><?php echo $err; ?></a>
      <br>
    </form>
  </div>
</body>
</html>
