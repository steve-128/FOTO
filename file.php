<?php
    require('db.php');
?>
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

    $sql="INSERT INTO post (Foto, Description, User) Values ('".$img."','".$_POST['description']."','".$_SESSION['username']."')";
    $conn->exec($sql);

    header("refresh: 1;url=mypage.php");
?>