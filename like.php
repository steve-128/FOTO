<!-- like form handler -->
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
    <title>Like form handler</title>
</head>
<body>
  <?php
    session_start();

    //like which post
    $like = $_POST['like'];
    //post id = pid
    $pid = $_POST['postid'];

    if($like)
        $sql = "INSERT INTO `post_like`(`Like_User`, `Like_post`) VALUES ('".$_SESSION['username']."','".$pid."')";
    else  $sql = "DELETE FROM `post_like` WHERE `Like_User` like '".$_SESSION['username']."'and `Like_post` = '".$pid."'";
    $result = $conn->query($sql);

    header("Location: ./main.php?");
    exit();
  ?>
</body>
</html>