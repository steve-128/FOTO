<!-- upload post form handler -->
<?php
    require('db.php');
?>
<?php
    session_start();
    
    echo "Your post:<br>";
    require('movefile.php');
    echo $_POST['description'];

    $sql="INSERT INTO post (Foto, Description, User) Values ('".$img."','".$_POST['description']."','".$_SESSION['username']."')";
    $conn->exec($sql);

    header("refresh: 1;url=mypage.php");
?>