<!-- display other users page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require('nav.php');
        require('db.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other user</title>
</head>
<body>
    <?php
        session_start();

        $other = $_GET['name'];

        $sql = "SELECT * FROM `post` 
                INNER JOIN `user` ON post.user = user.Username
                left join `post_like` on post.postID = post_like.Like_post 
                WHERE user.Username = '" . $other."'";
        $result = $conn->query($sql);

        $sql1 = "SELECT * FROM `followers` where `User` like'" . $_SESSION['username'] . "'";
        $result1 = $conn->query($sql1);

        $status = false;

        while ($row = $result1->fetch()) {

            if (strcmp($row['Following'], $other) == 0) {
                $status = true;
            }
        }

        echo "<a href='follow.php?name=" . $other . "&status=" . $status . "'>";
        if ($status) {
            echo "Unfollow ";
        } else echo "Follow ";
        echo $other;
        echo "</a>";
        echo "<br>";

        $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
        $like = $conn->query($likesql);
        $likerow = $like -> fetchAll();

        while ($row = $result->fetch()) {
            require('printpost.php');        
            require('likebottom.php');
        }
    ?>
</body>
</html>