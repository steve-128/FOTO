<?php
    require('db.php');
?>
<?php
    session_start();

    $search = $_POST['search'];

    $sql = "SELECT * FROM `user` WHERE `Username` like '%".$search."%'";
    $result = $conn->query($sql);

    while($row = $result->fetch())
    { 
        echo "<a href='otherspage.php?name=".$row['Username']."'>".$row['Username']."</a>";
        echo "<img src='".$row['Profile']."'";
        echo "<br>";
        echo "<br>";
    }
?>