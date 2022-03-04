

<?php
    session_start();
    echo "Your post:<br>";
    $folder = '\xampp\htdocs\php-lessons\project1\img\\';
    $path = $folder.$_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'],$path);
    $img = "./img/".$_FILES['upload']['name'];
    echo "<img src='./img/".$_FILES['upload']['name']."'>";
    echo "<br>";
    echo $_POST['description'];
    
    $servername = "localhost";
    $username = "root";
    $password = "lhmethod";

try {
  //connect to database
  $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Write database  
  $sql="INSERT INTO post (Foto, Description, User) Values ('".$img."','".$_POST['description']."','".$_SESSION['user_id']."')";
  $conn->exec($sql);
  //sql code
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};

header("refresh: 1;url=mypage.php");