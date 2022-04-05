<!-- comment form and display comments -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require('nav.php');
        require('db.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment of the post</title>
</head>
<body>
  <?php
      session_start();

      //post id = pid
      $pid = $_GET['postid'];

      $sqlPost = "SELECT * FROM `followers` 
              inner join `post` on post.User = followers.following 
              WHERE PostID like '".$pid."'";
      $post = $conn->query($sqlPost);
      $row = $post -> fetch();

      require('printpost.php');        

      $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
      $like = $conn->query($likesql);
      $likerow = $like -> fetchAll();

      require('likebottom.php');
      
      $commentSql = "SELECT * FROM `post_comment` 
                    inner join `post` on post_comment.Post = post.PostID
                    left join `user` on user.Username = post_comment.Comment_User
                    where PostID = ". $pid ."
                    ORDER BY post_comment.Time DESC";
      $comments = $conn->query($commentSql);

      
      echo "Comments:";
      echo "<hr>";
      
      while($row = $comments ->fetch())
      {
          echo "User: ". $row['Comment_User'];
          echo "<img src='".$row['Profile']."'>";
          echo "<br>";
          echo "Comment: ".$row['Comment'];
          echo "<br>";
          echo "Time: ".$row['Time'];
          echo "<br>";
          if($_SESSION['username']==$row['Comment_User'])
          {
              echo "<form action='./commentform.php' method = 'POST'>
                      <input type='hidden' name='comment_user' value='".$row['Comment_User']."'>
                      <input type='hidden' name='comment' value='".$row['Comment']."'>
                      <input type='hidden' name='postid' value='".$pid."'>
                      <input type='hidden' name='time' value='".$row['Time']."'>
                      <input type='submit' id='submit' name='submit' value='Edit'>
                    </form>";
              echo "<form action='./commentform.php' method = 'POST'>
                      <input type='hidden' name='comment_user' value='".$row['Comment_User']."'>
                      <input type='hidden' name='comment' value='".$row['Comment']."'>
                      <input type='hidden' name='postid' value='".$pid."'>
                      <input type='hidden' name='time' value='".$row['Time']."'>
                      <input type='submit' id='submit' name='submit' value='Delete'>
                    </form>";
          }
          echo "<hr>";
      }

      echo "<form action='./commentform.php' method = 'POST'>
              <input type='hidden' name='postid' value='".$pid."'>
              <input type='text' id='comment' name='comment'>
              <input type='submit' id='submit' name='submit' value='Comment'>
            </form>";
  ?>
</body>
</html>