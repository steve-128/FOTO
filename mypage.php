<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();

    $sql = "SELECT * FROM `post` 
            INNER JOIN `user` ON post.User = user.Username 
            WHERE post.User like '".$_SESSION['username']."'";
    $result = $conn->query($sql);

    $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
    $like = $conn->query($likesql);
    $likerow = $like -> fetchAll();

    while($row = $result->fetch())
    {
        echo "Post: ";
        echo $row['PostID'];
        echo "<br>";
        echo "<img src='".$row['Foto']."'>";
        echo "<br>";
        echo $row['Description'];
        echo "<br>";
        
        $LK = true;

        for($count = 0 ; $count<count($likerow);$count++)
        {
            if(($row['PostID']==$likerow[$count]['Like_post']))
            {
                $LK = false;
                break;
            }
        }
        echo "<form action='./like.php' method = 'POST'>
                        <input type='hidden' name='postid' value='".$row['PostID']."'>
                        <input type='hidden' name='like'";
        if($LK)
            echo "value='1'>
                    <input type='submit' value='💗'>
                  </form>";
        else echo " value='0'>
                      <input type='submit' value='💔'>
                    </form>";
    }
?>

    
