<?php
    require('nav.php');
?>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "lhmethod";

$other = $_GET['name'];

try {
    //connect to database
    $conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Write database  
    //sql code
    //$conn->exec(variable or code)
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};


$sql = "SELECT * FROM `post` INNER JOIN `user` ON post.user = user.User_ID WHERE user.Username = " . $other;
$result = $conn->query($sql);

$sql1 = "SELECT * FROM `followers` where `User` like'" . $_SESSION['username'] . "'";
$result1 = $conn->query($sql1);

$status = false;

while ($row = $result1->fetch()) {

    if (strcmp($row['Following'], $other) == 0) {
        $status = true;
    }
}


echo "<a href='follow.php?name=" . $other . "&status=" . $status . "'>";
if ($status) {
    echo "Unfollow ";
} else echo "Follow ";
echo $other;
echo "</a>";
echo "<br>";


while ($row = $result->fetch()) {
    echo "Post: ";
    echo $row['PostID'];
    echo "<br>";
    echo "<img src='" . $row['Foto'] . "'>";
    echo "<br>";
    echo $row['Description'];
    echo "<br>";
}
