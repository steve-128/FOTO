<?php
    require('nav.php');
?>
Upload Post
<form action='file.php' method="POST" enctype='multipart/form-data'>   
    <label for='upload'>Picture :<br></label>
    <input type='file' name='upload' id='upload' required>
    <br>
    <label for='description'>Description :<br></label>
    <input type='text' name='description' id='3' required>
    <br>
    <input type="submit">
</form>
