<!-- log in form handler -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in form handler</title>
</head>
<body>
    <?php
        $hostname = "us-cdbr-east-05.cleardb.net";
        $username = "b5360e8317bffd";
        $password = "bff46df7";
        $database = "heroku_9e9ee605a716345";

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $user = addslashes($user);
        $pass = addslashes($pass);

        try {
            //connect to database
            $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Write database
            //sql code
            //$conn->exec(variable or code)
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        };

        $result = $conn->query("select * from user");
        while($row = $result->fetch())
        {
            $name = $row['Username'];
            $word = $row['Password'];
            $mail = $row['Email'];

            if($name == $user && password_verify($pass, $word))
            {
                session_start();
                $_SESSION['fname'] = $_POST['fname'];
                $_SESSION['lname'] = $_POST['lname'];
                $_SESSION['username'] = $_POST['user'];
                $_SESSION['email'] = $mail;
                $_SESSION['password'] = $_POST['pass'];
                $_SESSION['user_id'] = $row['User_ID'];

                header("Location: ./main.php");
                exit();
            }
        }
        echo "username or password is incorrect";
    ?>
</body>
</html>
