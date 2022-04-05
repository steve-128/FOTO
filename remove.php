<!-- remove follower form handler -->
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
    <title>Remove follower form handler</title>
</head>
<body>
    <?php
        session_start();    

        //the removed person
        $other = $_GET['name'];

        $sql = "DELETE FROM `followers` WHERE `User` like '".$other."' and `Following` like '".$_SESSION['username']."'";
        $result = $conn->query($sql);

        header("Location: ./otherspage.php?name=$other");
        exit();
    ?>
</body>
</html>
   