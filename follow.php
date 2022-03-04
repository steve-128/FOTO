<?php

    session_start();    

    $servername = "localhost";
    $username = "root";
    $password = "lhmethod";
    

    try {
        //connect to database
        $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Write database  
        //sql code
        //$conn->exec(variable or code)
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    };

    $other = $_GET['name'];
    $status = $_GET['status'];

    if($status)
        $sql = "DELETE FROM `followers` WHERE `User` like '".$_SESSION['username']."' and `Following` like '".$other."'";
    else  $sql = "INSERT INTO `followers`(`User`, `Following`) VALUES ('".$_SESSION['username']."','".$other."')";

    $result = $conn->query($sql);

    header("Location: ./otherspage.php?name=$other");
    exit();
   