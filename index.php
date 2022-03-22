<!-- starting page -->
<nav>
    <a href='sign.php'>CLICK HERE</a> |
    <a href='log.php'>Log In</a> |
    <a href='help.php'>HELP</a>
</nav>

<?php
echo "Hi! This is an app that is similar to instagram but not as good as instagram!";
echo "<br>"; 

$hostname = "us-cdbr-east-05.cleardb.net";
$username = "b5360e8317bffd";
$password = "bff46df7";
$database = "heroku_9e9ee605a716345";
  //connect to database
try {
  $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Write database
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};
?>