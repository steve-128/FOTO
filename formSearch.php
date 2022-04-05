<!-- form handler for search -->
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
    <title>Search form handler</title>
</head>
<body>
    <?php
        session_start();

        $search = $_POST['search'];

        $sql = "SELECT * FROM `user` WHERE `Username` like '%".$search."%'";
        $result = $conn->query($sql);

        while($row = $result->fetch())
        { 
            echo "<a href='otherspage.php?name=".$row['Username']."'>".$row['Username']."</a>";
            echo "<img src='".$row['Profile']."'";
            echo "<br>";
            echo "<br>";
        }
    ?>
</body>
</html>