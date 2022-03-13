<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();

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
?>

    
