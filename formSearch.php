<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "lhmethod";

$search = $_POST['search'];
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

    $sql = "SELECT * FROM `user` WHERE `Username` like '%".$search."%'";
    $result = $conn->query($sql);
    while($row = $result->fetch())
    {
        echo "<img src='".$row['Profile']."'";
        echo "<br>";
        echo "<a href='otherspage.php?name=".$row['Username']."'>".$row['Username']."</a>";
        echo "<br>";
    }
