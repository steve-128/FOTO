<!-- view profile -->
<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();

    echo "user info";
    echo "<br>";

    $sql = "SELECT * FROM `user` where `username` like '".$_SESSION['username']."'";
    $result = $conn->query($sql);

    $row = $result -> fetchAll();
    
    echo "Profile: <img src='".$row[0]['Profile']."'>";
    echo "<br>";
    
    echo "<a href='./uploadprofile.php'>Upload profile pic</a>";
    echo "<br>";
    echo "username: ".$_SESSION['username'];
    echo "<br>";
    echo "email: ".$_SESSION['email'];
    echo "<br>";
    echo "<a href='viewfollows.php?view=0'>Followers</a>";
    echo "<br>";
    echo "<a href='viewfollows.php?view=1'>Following</a>";
    echo "<br>";

    echo "<form action='out.php' method='POST'>        
        <input type='submit' id='submit' name='submit' value='log out'> 
    </form>";
?>