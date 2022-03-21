<!-- search form -->
<?php
    require('nav.php');
?>
<h1> Search User</h1>
<form action='formSearch.php' method="POST"> 
    <label for='search'>Search Username:<br></label>
    <input type='text' name='search' id='search' >
    <br>
    <input type="submit" id='submit' name="submit" value="Submit"/>
</form>