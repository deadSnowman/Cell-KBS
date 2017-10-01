<?php
  $servername = "localhost";
  $username = "*****";
  $password = "*****";
  $db = "cell_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  // Queries to test
  //$sql = "SELECT maker, name, os, url FROM Cells";
  //$sql = "SELECT maker, name, os, url FROM Cells WHERE maker = 'Apple'";
  $sql = "SELECT maker, name, os, url FROM Cells WHERE os LIKE '%iOS 4%'";
  
  $result = $conn->query($sql);

  if($result->num_rows > 0) {
     echo "<table><tr><th>Maker</th><th>Name</th><th>OS</th><th>URL</th></tr>";

    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["maker"]."</td><td>".$row["name"]."</td><td>".$row["os"]."</td><td><a href=\"" .$row["url"]. "\">".$row["url"]."</a></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  


  $conn->close();

?> 
