<!-- upload profile pic form handler -->
<?php
    require('db.php');
?>
<?php
    session_start();
    require('movefile.php');
    $_SESSION['profilepic'] = $img;

    $sql="UPDATE `user` SET `Profile`='".$img."' WHERE `Username`='".$_SESSION['username']."'";
    $conn->exec($sql);


    echo "go reload";
    header("Location: ./profile.php");
    exit();
?>