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
  
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
  
  <div class="w3-container w3-display-container w3-padding-16">
    <form action="search.php" method="POST">
      <div class="row">
      	<div class="col s4">
      		<p><label><i class="fa fa-calendar-check-o"></i> Start Date</label></p>
      		<input class="w3-input w3-border datepicker" type="text" placeholder="YYYY/MM/DD" name="startdate" required>  
      	</div>
      	<div class="col s4">
      	    <p><label><i class="fa fa-calendar-o"></i> End Date</label></p>
            <input class="w3-input w3-border datepicker" type="text" placeholder="DD MM YYYY" name="enddate" required>
      	</div>
      	<div class="col s4">
      		<p><label><i class="fa fa-pet"></i> Type of Pet</label></p>
      		<select class="w3-input w3-border">
			  <option value="" disabled selected>Choose your option</option>
			  <option value="1">Bird</option>
			  <option value="2">Cat</option>
			  <option value="3">Dog</option>
			  <option value="4">Hamster</option>
			  <option value="5">Rabbit</option>
			</select>
      	</div>
      </div>
               
      <p><label><i class="fa fa-male"></i> Adults</label></p>
      <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">              
      <p><label><i class="fa fa-child"></i> Kids</label></p>
      <input class="w3-input w3-border" type="number" value="0" name="Kids" min="0" max="6">
      <p><button class="w3-button w3-block w3-green w3-left-align" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></p>
    </form>
  </div>

  <div class="container">
    <form name="search" action="search.php" method="POST">
      <div class="row">
          <div class="input-field col s4">
              <input type="text" class="datepicker"/>
              <label for="title">Start Date</label>
          </div>
          <div class="input-field col s4">
              <input type="text" class="datepicker"/>
              <label for="title">End Date</label>
          </div>
          <div class="input-field col s4">
              <input type="text" id="datepicker"/>
              <label for="title">Type of pet</label>
          </div>
        </div>
    </form>
  </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.parallax').parallax();
        });
    </script>
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true // Close upon selecting a date,
        });
    </script>
</body>
</html>
