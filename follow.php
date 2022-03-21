<!-- follow or unfollow people form handler -->
<?php
    require('db.php');
?>
<?php
    session_start();    

    $other = $_GET['name'];
    $status = $_GET['status'];

    if($status)
        $sql = "DELETE FROM `followers` WHERE `User` like '".$_SESSION['username']."' and `Following` like '".$other."'";
    else  $sql = "INSERT INTO `followers`(`User`, `Following`) VALUES ('".$_SESSION['username']."','".$other."')";

    $result = $conn->query($sql);

    header("Location: ./otherspage.php?name=$other");
    exit();
?>