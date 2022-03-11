<?php
    require('nav.php');
?>
<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "lhmethod";

  //connect to database
try {
  $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Write database
  //$conn->exec(variable or code)
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
};

$sql = "SELECT * FROM `post_like` inner join `post` ON post_like.Like_post = post.PostID where post_like.User like '".$_SESSION['username']."'";
$result = $conn->query($sql);

while($row = $result->fetch())
{
    echo "User: ".$row['User'];
    echo "<br>";
    echo "<img src='".$row['Foto']."'>";
    echo "<br>";
    echo $row['Description'];
    echo "<br>";
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