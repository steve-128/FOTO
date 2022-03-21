<?php
    $folder = '\xampp\htdocs\php-lessons\project1\img\\';
    $path = $folder.$_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'],$path);
    $img = "./img/".$_FILES['upload']['name'];
    echo "<img src='./img/".$_FILES['upload']['name']."'>";
    echo "<br>";
?>