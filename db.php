<!-- connect to database -->
<?php

$hostname = "us-cdbr-east-05.cleardb.net";
$username = "b5360e8317bffd";
$password = "bff46df7";
$database = "heroku_9e9ee605a716345";
  //connect to database
try {
  $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connected";
  //Write database
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};
?>