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

    $sql = "SELECT * FROM `post` 
            INNER JOIN `user` ON post.user = user.Username 
            left join `post_like` on post.postID = post_like.Like_post 
            WHERE user.Username = ".$_SESSION['username'];
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
        echo "<form action='./like.php' method = 'POST'>
                    <input type='hidden' name='postid' value='".$row['PostID']."'>
                    <input type='hidden' name='like'";
        if(!($row['PostID']==$row['Like_post']))
        {
            echo "value='1'>
                    <input type='submit' value='💗'>
                  </form>";
        }
        else
        {
            echo "value='0'>
                <input type='submit' value='💔'>
              </form>";
        }
    }

    
