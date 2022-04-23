<?php
    include("functions/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="main">
    <div class = "box">
        <h2>Register</h2>
        <form action="index.php" method = "post">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id = "fname" placeholder = "firstname"><br><br>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id = "lname" placeholder = "lastname"><br><br>
            <label for="username">Username: </label> 
            <input type="text" name="username" id = "username" placeholder = "username"><br><br>
            <label for="password">Password: </label>
            <input type="password" name="password" id = "password" placeholder = "password"><br><br>
            <label for="confirm">Confirm Password: </label> 
            <input type="password" name="confirm" id = "confirm" placeholder = "confirm password"><br>
            <p>Display Scores on leaderboard?</p>
            <label for="yes">Yes</label>
            <input type="radio" name = "display" value = "yes" id = "yes">
            <label for="no">No</label>
            <input type="radio" name = "display" value = "no" id = "no"><br><br>
            <button type = "submit" name = "register">Register</button>
        </form>
    </div>
    </div>
</body>
</html>