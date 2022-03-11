<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "lhmethod";

$like = $_POST['like'];
$pid = $_POST['postid'];

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

    if($like){
        $sql = "INSERT INTO `post_like`(`User`, `Like_post`) VALUES ('".$_SESSION['username']."','".$pid."')";}
    else  $sql = "DELETE FROM `post_like` WHERE `User` like '".$_SESSION['username']."'and `Like_post` = '".$pid."'";

    $result = $conn->query($sql);

    header("Location: ./main.php?");
    exit();