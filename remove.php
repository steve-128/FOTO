<?php
    require('db.php');
?>
<?php
    session_start();    

    $other = $_GET['name'];

    $sql = "DELETE FROM `followers` WHERE `User` like '".$other."' and `Following` like '".$_SESSION['username']."'";
    $result = $conn->query($sql);

    header("Location: ./otherspage.php?name=$other");
    exit();
?>
   