<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require("nav.php");
        require("db.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.simplefileupload.com/buckets/807627ca14520b5bbb91e89b80283b37.js"></script>
    <title>Upload file</title>
</head>
<body>
    <form action = "" method = "post" enctype = "multipart/form-data">
        <input type="hidden" name="avatar_url" id="avatar_url" class="simple-file-upload" require>
        <br>
        <input type="submit" name="submit" id="submit">
    </form>
    <?php
        session_start();
        if(isset($_POST['avatar_url']))
        {
            echo "<br>";
            echo "Your post:<br>";
            echo "<br>";
            echo "<img src='".$_POST['avatar_url']."'>";

            $user = $_SESSION['username'];
            $avatar_url = $_POST['avatar_url'];

            $sql="UPDATE `user` SET `Profile`='".$avatar_url."' WHERE `Username`='".$user."'";
            $conn->exec($sql);
        }
    ?>
</body>
</html>