<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='' name='Cellphone KBS'>
    <meta content='' name='Seth'>
    <title>Cellphone KBS</title>
    <link href='cellkbs.png' rel='icon'>
    <!-- Bootstrap core CSS -->
    <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for fixing padding -->
    <style>
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }
    </style>
    <!-- Custom style for image jumbotron/banner -->
    <link href='custom/css/jumbostyle.css' rel='stylesheet'>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]> <script src="bootstrap/assets/js/ie8-responsive-file-warning.js"></script> <![endif]-->
    <script src='bootstrap/assets/js/ie-emulation-modes-warning.js'></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>  <![endif]-->
    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
  </head>
  <body>
    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button aria-controls='navbar' aria-expanded='false' class='navbar-toggle collapsed' data-target='#navbar' data-toggle='collapse' type='button'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='index.php'>Cellphone KBS</a>
        </div>
        <div class='navbar-collapse collapse' id='navbar'>
          <ul class='nav navbar-nav'>
            <li class='active'>
              <a href='index.php'>Home</a>
            </li>
            <li>
              <a href='addcells.php'>Add Cells</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </nav>
    <div class='container'>
    <div class='row'>
      <div class='col-md-8'>
        <h1>Please fill out cell phone requirements</h1>
        <p>Welcome to Cellphone KBS!</p>
        <p>Our system will look up all cellphones with listed matches.  Leave a field blank (eg. -----) if you do not want it included in the search.</p>
      </div>
      <div class='col-md-4'>
        <br />
        <img src='cellkbslarge.png' />
      </div>
    </div>
      <hr />
      <div class='row'>
        <div class='col-md-5'>

          <?php include 'dbconnect.php' ?>

          <form name='cellform' action='process.php' method='POST'>
            <input type='hidden' name='check_submit' value='1' />
            <div class='form-group'>
              <?php
                $sql = "SELECT DISTINCT(maker) from Cells ORDER BY maker ASC";
                $result = $conn->query($sql);
              ?>
              <label for='cellform'>Make</label>
              <select name='Make' class='form-control'>
                <option value='donotsearch'>-----</option>
                <?php
                  if($result->num_rows > 0)
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row["maker"]."'>".$row["maker"]."</option>";
                  }
                ?>
              </select>
            </div>
            <div class='form-group'>
              <?php
                //$sql = "SELECT DISTINCT(os) from Cells ORDER BY os ASC";
                //$result = $conn->query($sql);
              ?>
              <label for='cellform'>OS</label>
              <select name='OS' class='form-control'>
                <option value='donotsearch'>-----</option>
                <?php
                  //if($result->num_rows > 0)
                  //  while($row = $result->fetch_assoc()) {
                  //    echo "<option value='".$row["os"]."'>".$row["os"]."</option>";
                  //}
                  include 'oslist.html';
                ?>
              </select>
            </div>
            <div class='form-group'>
              <?php
                //$sql = "SELECT DISTINCT(resolution) from Cells ORDER BY resolution DESC";
                //$result = $conn->query($sql);
              ?>
              <label for='cellform'>Resolution</label>
              <select name='Resolution' class='form-control'>
                <option value='donotsearch'>-----</option>
                <?php
                  if($result->num_rows > 0)
                    //while($row = $result->fetch_assoc()) {
                    //  echo "<option value='".$row["resolution"]."'>".$row["resolution"]."</option>";
                  //}
                  include 'reslist.html';
                ?>
              </select>
            </div>
            <div class='form-group'>
              <?php
                //$sql = "SELECT DISTINCT(primary_camera) from Cells ORDER BY primary_camera DESC";
                //$result = $conn->query($sql);
              ?>
              <label for='cellform'>Primary Camera</label>
              <select name='P-camera' class='form-control'>
                <option value='donotsearch'>-----</option>
                <?php
                  //if($result->num_rows > 0)
                  //  while($row = $result->fetch_assoc()) {
                  //    echo "<option value='".$row["primary_camera"]."'>".$row["primary_camera"]."</option>";
                  //}
                  include 'p_cameralist.html';
                ?>
              </select>
            </div>
            <div class='form-group'>
              <label for='cellform'>Secondary Camera</label>
              <select name='S-camera' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
            </div>
            <!--
            Storage/Memory are stored horrible in the databse, so I'm not using them
            -->
            <!--<div class='form-group'>
              <label for='cellform'>Storage</label>
              <select name='Storage' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option>16 GB</option>
                <option>32 GB</option>
                <option>64 GB</option>
                <option>128 GB</option>
              </select>
            </div>-->
        </div>
        <div class='col-md-5'>
            <!--<div class='form-group'>
              <label for='cellform'>Memory</label>
              <select name='Memory' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option>1GB RAM</option>
                <option>2GB RAM</option>
              </select>
            </div>-->
            <div class='form-group'>
              <label for='cellform'>Mem Card Slot</label>
              <select name='Memcard' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
            </div>
            <div class='form-group'>
              <?php
                //$sql = "SELECT DISTINCT(talktime) from Cells ORDER BY talktime DESC";
                //$result = $conn->query($sql);
              ?>
              <label for='cellform'>Talk time</label>
              <select name='Talktime' class='form-control'>
                <option value='donotsearch'>-----</option>
                <?php
                  //if($result->num_rows > 0)
                  //  while($row = $result->fetch_assoc()) {
                  //    echo "<option value='".$row["talktime"]."'>".$row["talktime"]."</option>";
                  //}
                ?>
                <?php
                  for($i = 70; $i >= 1; $i--)
                    echo "<option>{$i} h</option>";
                ?>
                <option>Other</option>
              </select>
            </div>
            <div class='form-group'>
              <label for='cellform'>Loudspeaker</label>
              <select name='Loudspeaker' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
            </div>
            <div class='form-group'>
              <label for='cellform'>3.5mm Jack</label>
              <select name='Jack' class='form-control'>
                <option value='donotsearch'>-----</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
            </div>
            <button class='btn btn-primary' type='submit'>Submit</button>
          </form>
        </div><!-- end 1st col div -->
      </div>
      <hr>
      <footer>
        <p>&copy; Cellphone KBS 2016</p>
      </footer>
    </div>
    <!-- Javascript -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='bootstrap/dist/js/bootstrap.min.js'></script>
    <script src='bootstrap/assets/js/ie10-viewport-bug-workaround.js'></script>
  </body>
</html>
