<?php
    include("functions/navbar.php");
    include("functions/logout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        button{
            justify-content: center; 
            position: absolute;
	        left: 50%;
	        top: 56%;
	        transform: translate(-50%,-30%);
        }
        a{
            overflow:hidden;
            color:black;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class = "main">
        <div class="box">
            <h2>Welcome to Tetris</h2><br>
        </div>
        <button><a href = "tetris.php">Click here to play</a></button>
    </div>  
</body>
</html>