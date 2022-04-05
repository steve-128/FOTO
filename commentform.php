<!-- delete or add comment form handler + edit comment form-->
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
    <title>Edit Comment</title>
</head>
<body>
    <?php
        session_start();

        //post id = pid
        $pid = $_POST['postid'];

        if($_POST['submit']!='Edit')
        {
            if($_POST['submit']=='Comment')
            {
                $_POST['comment'] = addslashes($_POST['comment']);

                $sql = "INSERT INTO `post_comment`(`Post`, `Comment`, `Comment_User`) 
                        VALUES ('".$_POST['postid']."','".$_POST['comment']."','".$_SESSION['username']."')";
                $result = $conn->query($sql);
            }
            elseif($_POST['submit']=='Delete')
            {
                $sql = "DELETE FROM `post_comment` 
                        WHERE `Comment_User` like '".$_POST['comment_user']."'
                        and `Comment` like '".$_POST['comment']."' 
                        and `Time` like '".$_POST['time']."'
                        and `Post` = '".$pid."'";
                $result = $conn->query($sql);
            }
            header("Location: ./comment.php?postid=".$pid);
            exit();
        }
        else{
            echo "<form action='./commentedit.php' method = 'POST'>
                        <input type='hidden' name='comment_user' value='".$_POST['comment_user']."'>
                        <input type='hidden' name='comment' value='".$_POST['comment']."'>
                        <input type='hidden' name='postid' value='".$pid."'>
                        <input type='hidden' name='time' value='".$_POST['time']."'>
                        <input type='text' name='new' placeholder='New comment' value= ''>
                        <input type='submit' id='submit' name='submit' value='Edit'>
                </form>";
        }
    ?>
</body>
</html>

    