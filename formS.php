<?php

$servername = "localhost";
$username = "root";
$password = "lhmethod";

$user = $_POST['user'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$first = $_POST['fname'];
$last = $_POST['lname'];
$user = addslashes($user);
$email = addslashes($email);
$first = addslashes($first);
$last = addslashes($last);
$pass = addslashes($pass);
$pass = password_hash($pass,PASSWORD_BCRYPT);
try {
  //connect to database
  $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Write database
  $result = $conn->query("select * from user");
  while($row = $result->fetch())
  {
      $name = $row['Username'];

      if($name == $user)
      {
          session_start();
          $_SESSION['errMsg'] = "Repeated Username";
          header("Location: ./sign.php");
          exit();
      }
  }
  
  $sql="INSERT INTO user (Fname, Lname, Username, Password, Email) Values ('".$first."','".$last."','".$user."','".$pass."','".$email."')";
  $conn->exec($sql);
  //sql code
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};

session_start();

$sql = "select * from `user` where `Username` = ".$user;
$result = $conn->query($sql);
$row = $result->fetch();

$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['username'] = $_POST['user'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['pass'];
$_SESSION['user_id'] = $row['User_ID'];

header("Location: ./main.php");
exit();
?>
