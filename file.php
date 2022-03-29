<!DOCTYPE html>
<html lang="en">
<head>
    <?php
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
        <input type="hidden" name="avatar_url" id="avatar_url" class="simple-file-upload">
        <input type="submit" name="submit" id="submit">
    </form>
</body>
</html>
<html>
<!-- upload post form handler -->

<!-- <?php
    session_start();
    
    


    echo "Your post:<br>";
    echo $_POST['description'];

    $sql="INSERT INTO post (Foto, Description, User) Values ('".$img."','".$_POST['description']."','".$_SESSION['username']."')";
    $conn->exec($sql);

    header("refresh: 1;url=mypage.php");
?> -->