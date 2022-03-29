<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require("nav.php");
        require("db.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.simplefileupload.com/buckets/807627ca14520b5bbb91e89b80283b37.js"></script>
    <title>Document</title>
</head>
<body>
    <form action = "" method = "post" enctype = "multipart/form-data">
        <input type="text" name="description">
        <input type="hidden" name="avatar_url" id="avatar_url" class="simple-file-upload">
        <input type="submit" name="submit" id="submit">
    </form>
    <?php
        if(isset($_POST['avatar_url']))
        {
            echo "<br>";
            echo "Your post:<br>";
            echo "<br>";
            echo "<img src='".$_POST['avatar_url']."'>";
        }
    session_start();

    echo $_SESSION['username']. " ahhhhhhhhhhhhhhhhhh ";

    $sql="INSERT INTO post (Foto, Description, User) Values ('".$_POST['avatar_url']."','".$_POST['description']."','".$_SESSION['username']."')";
    $conn->exec($sql);

    // header("refresh: 1;url=mypage.php");
?>
    
</body>
</html>
<html>