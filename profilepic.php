<?php
    session_start();
    $folder = '\xampp\htdocs\php-lessons\project1\img\\';
    $path = $folder.$_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'],$path);
    $img = "./img/".$_FILES['upload']['name'];
    $_SESSION['profilepic'] = $img;
    
    $servername = "localhost";
    $username = "root";
    $password = "lhmethod";

    try {
      //connect to database
      $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //Write database  
      $sql="UPDATE `user` SET `Profile`='".$img."' WHERE `Username`='".$_SESSION['username']."'";
      $conn->exec($sql);
      //sql code
      //$conn->exec(variable or code)
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    };

    header("refresh: 1;url=mypage.php");