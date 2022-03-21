<!-- display all liked post -->
<?php
  require('nav.php');
  require('db.php');
?>
<?php

  session_start();

  $sql = "SELECT * FROM `post_like` 
          inner join `post` ON post_like.Like_post = post.PostID 
          where post_like.Like_User like '".$_SESSION['username']."'";
  $result = $conn->query($sql);

  $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
  $like = $conn->query($likesql);
  $likerow = $like -> fetchAll();

  while($row = $result->fetch())
  {
    require('printpost.php');        
    require('likebottom.php');
      
  }
?>