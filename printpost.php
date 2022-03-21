<!-- print post function -->
<?php
    echo "Post: ";
    echo $row['PostID'];
    echo "<br>";
    echo "<img src='" . $row['Foto'] . "'>";
    echo "<br>";
    echo $row['Description'];
    echo "<br>";
?>