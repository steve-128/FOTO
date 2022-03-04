<?php

$servername = "localhost";
$username = "root";
$password = "lhmethod";

$user = $_POST['user'];
$pass = $_POST['pass'];

$user = addslashes($user);
$pass = addslashes($pass);


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

$result = $conn->query("select * from user");
while($row = $result->fetch())
{
    $name = $row['Username'];
    $word = $row['Password'];
    $mail = $row['Email'];

    if($name == $user && password_verify($pass, $word))
    {
        session_start();
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['email'] = $mail;
        $_SESSION['password'] = $_POST['pass'];
        $_SESSION['user_id'] = $row['User_ID'];

        header("Location: ./main.php");
        exit();
    }
}
echo "username or password is incorrect";