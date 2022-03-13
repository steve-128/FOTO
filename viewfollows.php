<?php
    require('db.php');
?>
<?php
    session_start();

    $view = $_GET['view'];

    if($view==0)
    {
        $sql = "SELECT * FROM `followers` inner join `user` on user.username = followers.user WHERE `Following` like '".$_SESSION['username']."'";
        echo "Followers: <br>";
    }
    else {
        $sql = "SELECT * FROM `followers` inner join `user`on user.username = followers.following WHERE `User` like '".$_SESSION['username']."'";
        echo "Following: <br>";
    }
    $result = $conn->query($sql);

    if($view==0)
    {
        while ($row = $result->fetch()) {
            echo $row['User'];
            echo "<a href='remove.php?name=" . $row['User'] . "'>Remove</a>";
            echo "<br>";
            if(isset($row['Profile']))
            {
                echo "Profile: <img src='".$row['Profile']."'>";
            }
            echo "<br>";
        }
    }
    else 
    {
        while ($row = $result->fetch()) {
            echo $row['Following'];
            echo "<a href='follow.php?name=" . $row['Following'] . "&status=true'>Unfollow</a>";
            echo "<br>";
            if(isset($row['Profile']))
            {
                echo "Profile: <img src='".$row['Profile']."'>";
            }
            echo "<br>";
        }
    }
?>