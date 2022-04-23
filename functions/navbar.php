<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: blue;
}


li a {
  display: block;
  font-family:Arial;
  font-size : 12px;
  font-weight: bold;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

#home{
	float: left;
}

#leaderboard{
	float: right;
}
#playtetris{
	float: right;
}

</style>
</head>
<body>

<ul>
  <li><a name = "home" id="home" href="./index.php">Home</a></li>
  <li><a name = "leaderboard" id = "leaderboard" href="./leaderboard.php">LeadBoard</a></li>
  <li><a name = "tetris" id = "playtetris" href="./tetris.php">Play Tetris</a></li>
</ul>

</body>
</html>