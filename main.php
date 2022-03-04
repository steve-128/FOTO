<?php
    require('nav.php');
?>
<?php

session_start();
echo "Welcome, user";
echo "<br>";


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
//4. Build a home page that shows the latest posts from all the user's follows
//  - Consider what queries you will need to do as this is a two step process 
$sql = "SELECT * FROM `followers` inner join `post` on post.User = followers.following WHERE followers.user like ".$_SESSION['username'];
$result = $conn->query($sql);

while($row = $result -> fetch())
{
    echo "User: ".$row['User'];
    echo "<br>";
    echo "<img src='".$row['Foto']."'>";
    echo "<br>";
    echo $row['Description'];
    echo "<br>";
}

