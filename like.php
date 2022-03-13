<?php
    require('db.php');
?>
<?php
  session_start();

  $like = $_POST['like'];
  $pid = $_POST['postid'];

  if($like)
      $sql = "INSERT INTO `post_like`(`User`, `Like_post`) VALUES ('".$_SESSION['username']."','".$pid."')";
  else  $sql = "DELETE FROM `post_like` WHERE `User` like '".$_SESSION['username']."'and `Like_post` = '".$pid."'";
  $result = $conn->query($sql);

  header("Location: ./main.php?");
  exit();
?>