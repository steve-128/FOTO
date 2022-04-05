<!-- follow or unfollow people form handler -->
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
    <title>Follow and unfollow form handler</title>
</head>
<body>
    <?php
        session_start();    

        $other = $_GET['name'];
        $status = $_GET['status'];

        if($status)
            $sql = "DELETE FROM `followers` WHERE `User` like '".$_SESSION['username']."' and `Following` like '".$other."'";
        else  $sql = "INSERT INTO `followers`(`User`, `Following`) VALUES ('".$_SESSION['username']."','".$other."')";

        $result = $conn->query($sql);

        header("Location: ./otherspage.php?name=$other");
        exit();
    ?>
</body>
</html>