<nav>
    <a href="./index.php">LOG IN/SIGN UP</a>
</nav>
SIGN UP
<form action='formS.php' method="POST">   
    <label for='fname'>First Name:<br></label>
    <input type='text' name='fname' id='fname' required>
    <br>     
    <label for='lname'>Last Name:<br></label>
    <input type='text' name='lname' id='lname' required>
    <br>     
    <label for='user'>Username:<br></label>
    <input type='text' name='user' id='user' required>
    <br>
    <label for='email'>Email:<br></label>
    <input type='email' id="email" name="email" required>
    <br>
    <label for='pass'>Password:<br></label>
    <input type='password' id="pass" name="pass" required>
    <br>
    <input type="submit" id='submit' name="submit" value="Submit">  
</form>
<?php
session_start();
if(isset($_SESSION['errMsg'])) {
    echo $_SESSION['errMsg'];
}