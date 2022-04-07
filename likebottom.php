<!-- show the liked bottom -->
<?php
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
                <input type='submit' class='like' value='💗'>
              </form>";
    else echo " value='0'>
                  <input type='submit' class='like' value='💔'>
                </form>";
?>