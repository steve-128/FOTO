<!-- the main page/feed that shows the latest posts from all followers -->
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
    <title>Main page</title>
</head>
<body>
    <?php
        session_start();
        echo "Welcome, user";
        echo "<br>";

        $sql = "SELECT * FROM `followers` 
                inner join `post` on post.User = followers.following  
                WHERE followers.User like '".$_SESSION['username']."' 
                ORDER BY post.PostTime DESC";
        $result = $conn->query($sql);

        $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
        $like = $conn->query($likesql);
        $likerow = $like -> fetchAll();
        
        while($row = $result -> fetch())
        {
            require('printpost.php');        
            require('likebottom.php');

            echo "<a href='likeby.php?postid=" . $row['PostID'] . "'>Liked Users</a>";

            $commentsql = "SELECT count(Comment) FROM `post_comment` WHERE `Post` = '".$row['PostID']."'";
            $commentnum = $conn->query($commentsql);
            $num = $commentnum -> fetch();

            echo "<a href='comment.php?postid=" . $row['PostID'] . "'>".$num['count(Comment)']." Comments</a>";
            echo "<br>";
            echo "<br>";
        }
    ?>
</body>
</html>

