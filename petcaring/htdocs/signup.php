
<!DOCTYPE html>  
<head>
  <title>Pet Caring</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    body{
      background:url(img/homepage_cat.jpg);
      background-size:cover;
      margin:0;
      font-family:sans-serif;
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
    select{
      width:77%;
      height:32px;
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
      height:600px;
      background: rgba(0,0,0,.2);
      box-shadow: 5px 4px 43px #000;
      position:absolute;
      top:50px;
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
      text-align=left;
      color:#fff;
    }
    d{
      color:#e51c23;
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
    if (isset($_POST['signup'])) { // Submit the update SQL command
      if ($_POST[email]==null) $err = 'Please enter email';
      else if ($_POST[password]==null) $err= 'Please enter password';
      else if (!is_null($POST[postal_code])&&!is_numeric($POST[postal_code])) $err ='Invalid postal code';
      else if ($_POST[region]<>null && $_POST[region]<>'North' && $_POST[region]<>'South'&& $_POST[region]<>'West' &&$_POST[region]<>'East') $err= 'region should be North or East or West or South';
      else if ($_POST[password]<>$_POST[password2]) $err ='Different passwords';
      else {
        $result = pg_query($db, "INSERT INTO account VALUES ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[region]','$_POST[address]','$_POST[postal_code]')");
        if (!$result)  $err = 'Email registered';
        else {
          session_start();
          $_SESSION[email] = $_POST[email];
          header("location: index.php");
        }
      }}
    ?>  
    <div>
        <form name="display" action="signup.php" method="POST">
          <b>Sign up</b>
          <br><br>
          <a>Already have an account?</a>
          <a href="login.php" style="color:#42A5F5; text-decoration: none">Login here</a>
          <input type="text" name="email" value="<?php echo $_POST[email]; ?>" placeholder="Email" id="" /> 
          <input type="text" name="name" value="<?php echo $_POST[name]; ?>" placeholder="Name"/>
          <input type="password" name="password" placeholder="Password" />
          <input type="password" name="password2" placeholder="Enter your password again" />
            
          <select>
          <option value="" disabled selected>Region</option>
          <option value="West">West</option>
          <option value="East">East</option>
          <option value="West">North</option>
          <option value="East">South</option>
          </select>
          <input type="text" name="address" value="<?php echo $_POST[address]; ?>" placeholder="Address"/> 
          <input type="text" maxlength="6" name="postal_code" value="<?php echo $_POST[postal_code]; ?>" placeholder= "Postal code"/>
          <input type="submit" style="background:#42A5F5; color:#fff" name="signup" value = "SIGNUP" /> 
          <a href="index.php" style= "text-decoration: none">Return to home page</a><br>
          <a style="color:#e51c23"><?php echo $err; ?></a>
          </form>  
        </div>
</body>
</html>