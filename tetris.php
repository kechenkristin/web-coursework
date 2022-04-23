<?php
    include("functions/navbar.php");
    include("functions/logout.php");
?>

<?php 
 session_start();
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $username = $_SESSION["username"];
  echo ("Current player $username");
  }else{
    echo '<script>alert("Please login first");history.go(-1);</script>';
  }

  if(isset($_POST["score"])) 
  {
    include("functions/dbconnect.php");
    $connect = $conn;
    $score = $_POST["score"];
    $username = $_SESSION["username"];
    $sql = $connect->query("SELECT Display FROM Users where Username ='{$username}'");
    $row = mysqli_fetch_assoc($sql);
    // user does not select display score
    if ($row["Display"] == 0) { 
      echo '<script>alert("You do not want to display your score!")</script>';
    }else{
      // user selects display score
      echo '<script>alert("You want to display your score!")</script>';
      $query = "INSERT INTO Scores(UserName, Score) VALUES('$username', '$score')";
        if(mysqli_query($connect, $query)){
          echo '<script>alert("Scores has recorded to the leaderboard")</script>';
        } 
      }
  }  
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>tetris</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/style.css">
  <style>
    #start {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: blue;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    #end {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: blue;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }


    .board {
      width: 300px;
      height: 600px;
      background-image: url("imgs/tetris-grid-bg.png");
      border: 1px solid;
      box-shadow: 5px 5px;
      background-color: #c7c7c7;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }


    #game-canvas {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    #scoreboard {
      position:absolute;
      bottom:0;
      left:0;
      width: 100px;
      height: 120px;
      border: 3px solid rgb(0, 242, 255);
      color: blue;
    }
  </style>
</head>

<body>
  <div class="main">
    <h2 id="scoreboard">Score: 0</h2>
    <div class="board">
      <canvas id="game-canvas" width="300" height="600"></canvas>
      <script src="gametest/constants.js"></script>
      <script src="gametest/piece.js"></script>
      <script src="gametest/gamemodel.js"></script>
      <script src="gametest/tetris.js"></script>
    </div>
  </div>
  <button id="start" onclick="gamebegin(this)">Start the game</button>
  <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' id='form'>
  </form>
</body>

</html>