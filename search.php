<!-- search form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fotoapp.css" rel="stylesheet">
    <?php
        require('nav.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <h1> Search User</h1>
    <form action='formSearch.php' method="POST"> 
        <label for='search'>Search Username:<br></label>
        <input type='text' name='search' id='search' >
        <br>
        <input type="submit" id='submit' name="submit" value="Submit"/>
    </form>
</body>
</html>