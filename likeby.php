<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require('db.php');
        require('nav.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove follower form handler</title>
</head>
<body>
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
</body>
</html>