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
            <li>
              <a href='index.php'>Home</a>
            </li>
            <li class='active'>
              <a href='addcells.php'>Add Cells</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </nav>
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <h1>Results</h1>
          <hr />
<?php
  // Catch variables from form and display user entries
  include 'catchpost.php';
  echo"<br />";

  // Connect to database
  include 'dbconnect.php';

  // Start INSERT Query
  $sql = "INSERT INTO Cells (maker, name, url, os, resolution, primary_camera, secondary_camera, memory, mem_card_slot, talktime, loudspeaker, jack)\n";
  
  //EXAMPLE
  //INSERT INTO Cells (maker, name, url, os, resolution, primary_camera, secondary_camera, memory, mem_card_slot, talktime, loudspeaker, jack)
  //VALUES ('Toshiba', 'Excite Pro', 'http://gsmarena.com/toshiba_excite_pro-5500.php', 'Android OS, v4.2.1 (Jelly Bean)', '2560 x 1600 pixels, 10.1 inches (~299 ppi pixel density)', '8 MP, 3264 x 2448 pixels, autofocus, LED flash', 'Yes, 1.2 MP', '32 GB, 2 GB RAM', 'microSD, up to 32 GB', 'Up to 11 h (multimedia)', 'Yes, with stereo speakers', 'Yes');

  
  /*
   * CHECK IF CRITERIA WAS ADDED
   * TO THE QUERY
   */
  $criteria = false;
  //if($maker != 'donotsearch' || $os != 'donotsearch'|| $res != 'donotsearch' || $pcam != 'donotsearch' || $scam != 'donotsearch' || $memcard != 'donotsearch' || $talktime != 'donotsearch' || $loudspeaker != 'donotsearch' || $jack != 'donotsearch') {
  if($maker != '' || $name != '' || $os != '' && $res != '' || $pcam != '' || $scam != 'donotsearch' || $memcard || 'donotsearch' || $talktime != '' || $loudspeaker != 'donotsearch' || $jack != 'donotserach') {
    echo "<p><b>Criteria added to insert</b><p>";
    $criteria = true;
  } else {
    echo "<p><b>No criteria added to insert</b></p>";
    $criteria = false;
  }

  if($maker != '' && name != '') {
    //maker / name needed
    if($os == '')
      $os = 'NULL';
    if($res == '')
      $res = 'NULL';
    if($pcam == '')
      $pcam = 'NULL';
    if($scam == 'donotsearch')
      $scam = 'NULL';
    if($memcard == 'donotsearch')
      $memcard = 'NULL';
    if($talktime == '')
      $talktime = 'NULL';
    if($loudspeaker == 'donotsearch')
      $loudspeaker = 'NULL';
    if($jack == 'donotsearch')
      $jack = 'NULL';

    if($criteria) {
      $sql.="VALUES ('{$maker}', '{$name}', 'NULL', '{$os}', '{$res}', '{$pcam}', '{$scam}', 'NULL', '{$memcard}', '{$talktime}', '{$loudspeaker}', '{$jack}')";
    }

    //echo "<p>{$sql}</p>";
    //$result = $conn->query($sql);

    echo "<hr />";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      echo "Could not create new record";
    }

  } else {
    echo "<h2>You did not enter \"maker\" or \"name\"</h2>";
  }


  // Disconnect from database
  include 'dbdisconnect.php';
?>

        </div>
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
