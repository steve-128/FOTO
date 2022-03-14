<?php
    require('nav.php');
    require('db.php');
?>
<?php
    session_start();

    $pid = $_GET['postid'];

    $sqlPost = "SELECT * FROM `followers` 
            inner join `post` on post.User = followers.following 
            left join `post_like` on post.postID = post_like.Like_post 
            WHERE post.PostID like '".$pid."'";

//////////////////////////////can left join comment again
    $post = $conn->query($sqlPost);
    $postRow = $post -> fetch();

    echo "User: ".$postRow['Following'];
    echo "<br>";
    echo "<img src='".$postRow['Foto']."'>";
    echo "<br>";
    echo $postRow['Description'];
    echo "<br>";
    echo "<form action='./like.php' method = 'POST'>
                <input type='hidden' name='postid' value='".$postRow['PostID']."'>
                <input type='hidden' name='like'";
    if(!($postRow['PostID']==$postRow['Like_post']))
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
    
    $commentSql = "SELECT * FROM `post_comment` 
                   inner join `post` on post_comment.Post = post.PostID
                   where post.PostID = '". $pid ."'
                   ORDER BY post_comment.Time DESC";
    $comments = $conn->query($commentSql);

    echo "<hr>";
    echo "Comments:";
    
    while($row = $comments ->fetch())
    {
        echo "User: ". $row['Comment_User'];
        echo "<br>";
        echo "Comment: ".$row['Comment'];
        echo "<br>";
        echo "Time: ".$row['Time'];
        echo "<br>";
        echo "<hr>";
    }


    
?>