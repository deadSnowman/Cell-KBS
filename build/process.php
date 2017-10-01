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
        <div class='col-md-12'>
          <h1>Results</h1>
          <hr />
<?php
  // Catch variables from form and display user entries
  include 'catchpost.php';
  echo"<br />";

  // Connect to database
  include 'dbconnect.php';

  // Start SELECT Query
  $sql = "SELECT * from Cells";

  /*
   * CHECK IF CRITERIA WAS ADDED
   * TO THE QUERY
   */
  $criteria = false;
  if($maker != 'donotsearch' || $os != 'donotsearch'|| $res != 'donotsearch' || $pcam != 'donotsearch' || $scam != 'donotsearch' || $memcard != 'donotsearch' || $talktime != 'donotsearch' || $loudspeaker != 'donotsearch' || $jack != 'donotsearch') {
    echo "<p><b>Criteria added to search</b><p>";
    $criteria = true;
  } else {
    echo "<p><b>No criteria added to search</b></p>";
    $criteria = false;
  }

  if($criteria) {
    $sql.=" WHERE";
  }

  include 'searchcriteria.php';

  $sql.=" ORDER BY name ASC";
  //echo "<p>Search String: \"<b>{$sql}</b>\"</p>";
  $result = $conn->query($sql);

  echo "<hr />";

  /*
   * CREATE TABLE
   */

  if($result->num_rows > 0) {
    echo "<h1>".$result->num_rows." Results found</h1>";
    echo"<table class='table table-striped'>
    <tr>
      <th>Maker</th>
      <th>Name</th>
      <th>URL</th>
      <th>OS</th>
      <th>Memory Card Slot</th>
      <th>Talk time</th>
    </tr>";
    
    if($result->num_rows > 0)
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row["maker"]}</td>
        <td>{$row["name"]}</td>
        <td><a href=\"{$row["url"]}\">GSMArena</a></td>
        <td>{$row["os"]}</td>
        <td>{$row["mem_card_slot"]}</td>
        <td>{$row["talktime"]}</td>
        </tr>";
      }
    echo"</table>";
  } else {
    echo "<h1>No results found</h1>";
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
