<!DOCTYPE html>
<html>
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
    <!--navigation bar-->
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Pet Caring</a>
        <ul class="right">
          <li><a href="/petcaring/index.php">Home</a></li>
          <li><a href="/petcaring/login.php">Log in</a></li>
          <li><a href="/petcaring/signup.php">Sign up</a></li>
        </ul>
      </div>
    </nav>

    <div class = "container">
      <?php $x = 5; while($x > 0): $x--; ?>
        <div class="row">
          <div class="col s12 m8">
            <div class="card-panel">
              <h5>Pet name</h5>
              <ul>
                <li>type</li>
                <li>species</li>
                <li>dob</li>
                <li>size</li>
              </ul>
              <!--edit button-->
              <a class = "waves-effect waves-light btn-floating modal-trigger" href="#modal1">
                <i class = "material-icons">edit</i>
              </a>

              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>Edit pet information</h4>
                  <form id="edit" action="test.php" method="post">
                    <!--text field for pet name-->
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="Alvin" id="new_pet_name" type="text" class="validate">
                        <label class="active" for="first_name2">Pet name</label>
                      </div>
                    </div>
                    <!--text field for pet type-->
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="Alvin" id="new_pet_type" type="text" class="validate">
                        <label class="active" for="first_name2">Pet type</label>
                      </div>
                    </div>
                    <!--text field for pet species-->
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="Alvin" id="new_pet_species" type="text" class="validate">
                        <label class="active" for="first_name2">Pet species</label>
                      </div>
                    </div>
                    <!--text field for pet dob-->
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="Alvin" id="new_pet_dob" type="text" class="validate">
                        <label class="active" for="first_name2">Pet dob</label>
                      </div>
                    </div>
                    <!--text field for pet size-->
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="Alvin" id="new_pet_size" type="text" class="validate">
                        <label class="active" for="first_name2">Pet size</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                      <button form="edit" class="modal-action modal-close btn waves-effect waves-light" type="submit" name="submit">Submit</button>
                    </div>
                  </form>
                  <?php echo $_POST["new_pet_name"];
                        echo $_POST["new_pet_size"];
                  ?>
                </div>
              </div>

              <!--delete button-->
              <a class = "btn-floating waves-effect waves-light red modal-trigger" href="#modal2">
                <i class = "material-icons">delete</i>
              </a>
              <div id="modal2" class="modal">
                <div class="modal-content">
                  <h4>Delete pet</h4>
                  <p>Are you sure you want to delete this pet?</p>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red">No</a>
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat blue">Yes</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();
      });
    </script>
  </body>
</html>
