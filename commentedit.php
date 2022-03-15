<?php
    require('db.php');
?>
<?php
    session_start();

    $pid = $_POST['postid'];
    $new = $_POST['new'];

    $sql = "UPDATE `post_comment` 
            SET `Post`='".$pid."',`Comment`='".$new."',
            `Time`= CURRENT_TIMESTAMP(),`Comment_User`='".$_SESSION['username']."' 
            WHERE `Comment_User` like '".$_POST['comment_user']."'
                and `Comment` like '".$_POST['comment']."' 
                and `Time` like '".$_POST['time']."'
                and `Post` = '".$pid."'";
    $result = $conn->query($sql);

    header("Location: ./comment.php?postid=".$pid);
    exit();
?>


    