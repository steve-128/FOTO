<!-- display current user's page -->
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
    <title>Display user page</title>
</head>
<body>
    <?php
        session_start();

        $sql = "SELECT * FROM `post` 
                INNER JOIN `user` ON post.User = user.Username 
                WHERE post.User like '".$_SESSION['username']."'";
        $result = $conn->query($sql);

        $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
        $like = $conn->query($likesql);
        $likerow = $like -> fetchAll();

        while($row = $result->fetch())
        {
            require('printpost.php');        
            require('likebottom.php');
        }
    ?>
</body>
</html>
    
