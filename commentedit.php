<!-- edit comment form handler -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require('db.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment form handler</title>
</head>
<body>
    <?php
        session_start();

        //post id = pid
        $pid = $_POST['postid'];
        //new comment = new
        $new = $_POST['new'];
        $new = addslashes($new);

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
</body>
</html>


    