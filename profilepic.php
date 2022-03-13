<?php
    require('db.php');
?>
<?php
    session_start();
    $folder = '\xampp\htdocs\php-lessons\project1\img\\';
    $path = $folder.$_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'],$path);
    $img = "./img/".$_FILES['upload']['name'];
    $_SESSION['profilepic'] = $img;

    $sql="UPDATE `user` SET `Profile`='".$img."' WHERE `Username`='".$_SESSION['username']."'";
    $conn->exec($sql);

    header("refresh: 1;url=mypage.php");
?>