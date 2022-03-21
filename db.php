<!-- connect to database -->
<?php
$servername = "localhost";
$username = "root";
$password = "lhmethod";
  //connect to database
try {
  $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Write database
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};
?>