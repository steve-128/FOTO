<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();
    $pid = $_GET['postid'];


    $sql = "SELECT * FROM `post_like` inner join `post` on `Like_post` = `PostID` WHERE PostID = '".$pid."'";
    $result = $conn->query($sql);
    
    echo "Liked by: ";
    echo "<br>";

    while($row = $result -> fetch())
    {
        echo "Username: ";
        echo $row['Like_User'];
        echo "<br>";
    }
?>