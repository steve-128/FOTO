<?php
    require('nav.php');
?>
<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "lhmethod";
    
    try {
        //connect to database
        $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Write database  
        //sql code
        //$conn->exec(variable or code)
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    };

    $sql = "SELECT * FROM `post` INNER JOIN `user` ON post.user = user.User_ID WHERE user.User_ID = ".$_SESSION['user_id'];
    $result = $conn->query($sql);
    while($row = $result->fetch())
    {
        echo "Post: ";
        echo $row['PostID'];
        echo "<br>";
        echo "<img src='".$row['Foto']."'>";
        echo "<br>";
        echo $row['Description'];
        echo "<br>";
    }

    
