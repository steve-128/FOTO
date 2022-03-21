<!-- upload profile pic form  -->
<?php
    require('nav.php');
?>
Upload Profile
<form action='profilepic.php' method="POST" enctype='multipart/form-data'>   
    <label for='upload'>Picture :<br></label>
    <input type='file' name='upload' id='upload' required>
    <br>
    <input type="submit">
</form>
