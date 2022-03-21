<!-- display current user's page -->
<?php
    require('nav.php');
    require('db.php');
?>
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

    
