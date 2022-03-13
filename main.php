<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();
    echo "Welcome, user";
    echo "<br>";

    $sql = "SELECT * FROM `followers` 
            inner join `post` on post.User = followers.following 
            left join `post_like` on post.postID = post_like.Like_post 
            WHERE followers.user like '".$_SESSION['username']."' 
            ORDER BY post.PostTime DESC";

    $result = $conn->query($sql);

    while($row = $result -> fetch())
    {
        echo "User: ".$row['Following'];
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