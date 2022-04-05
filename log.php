<!-- log in form  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <nav>
        <a href="./index.php">LOG IN/SIGN UP</a>
    </nav>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
</head>
<body>
    LOG IN
    <form action='formL.php' method="POST">        
        <label for='user'>Username:<br></label>
        <input type='text' name='user' id='user' required>
        <br>
        <label for='pass'>Password:<br></label>
        <input type='password' id="pass" name="pass" required>
        <br>
        <input type="submit" id='submit' name="submit" value="Submit"/>  
    </form>
</body>
</html>
