<!-- like form handler -->
<?php
    require('db.php');
?>
<?php
  session_start();

  //like which post
  $like = $_POST['like'];
  //post id = pid
  $pid = $_POST['postid'];

  if($like)
      $sql = "INSERT INTO `post_like`(`Like_User`, `Like_post`) VALUES ('".$_SESSION['username']."','".$pid."')";
  else  $sql = "DELETE FROM `post_like` WHERE `Like_User` like '".$_SESSION['username']."'and `Like_post` = '".$pid."'";
  $result = $conn->query($sql);

  header("Location: ./main.php?");
  exit();
?>