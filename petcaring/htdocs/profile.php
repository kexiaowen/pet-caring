<?php 
  session_start(); 
  if(!isset($_SESSION[email]) || empty($_SESSION[email]))
    header("location: login.php");
  else include ('headerHi.php'); 
 ?>
<!DOCTYPE html>
<head>
  <title >Pet Caring</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h2 class="header center light-blue-text text-lighten-1">We treat your pet like family</h2>
        <div class="row center">
          <h5 class="header col s12 light grey-text lighten-3">The nation’s largest network of pet sitters</h5>
        </div>
        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light light-blue lighten-1">Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="img/homepage_cat.jpg"></div>
  </div>

  <!--
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">We treat your pet like family</h1>
      <div class="row center">
        <h5 class="header col s12 light">The nation’s largest network of pet sitters.</h5>
      </div>
      <div class="row center">
        <a href="#" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>

    </div>
  </div>-->

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons large">face</i></h2>
            <h5 class="center">Search</h5>

            <h6 class="light homepage-content">Browse the profiles of available care takers and pick the perfect sitter for your pet.</h6>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons large">attach_money</i></h2>
            <h5 class="center">Bid</h5>

            <h6 class="light homepage-content">Place a bid to request for the service.</h6>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons large">time_to_leave</i></h2>
            <h5 class="center">Relax</h5>

            <h6 class="light homepage-content">Relax while you are away as our care taker will look after your pet.</h6>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.parallax').parallax();
        });
    </script>
</body>
</html>
