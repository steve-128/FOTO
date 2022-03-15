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
            WHERE followers.User like '".$_SESSION['username']."' 
            ORDER BY post.PostTime DESC";
    $result = $conn->query($sql);

    $likesql = "SELECT * FROM `post_like` where Like_User like '".$_SESSION['username']."'";
    $like = $conn->query($likesql);
    $likerow = $like -> fetchAll();
    while($row = $result -> fetch())
    {
        echo "User: ".$row['Following'];
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

        $commentsql = "SELECT count(Comment) FROM `post_comment` WHERE `Post` = '".$row['PostID']."'";
        $commentnum = $conn->query($commentsql);
        $num = $commentnum -> fetch();

        echo "<a href='comment.php?postid=" . $row['PostID'] . "'>".$num['count(Comment)']." Comments</a>";
        echo "<br>";
        echo "<br>";

    }
?>