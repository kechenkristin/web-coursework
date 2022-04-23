<?php
    include("functions/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        thead{
            background-color:blue;
        }
        #ltable{
            border-collapse: separate;
            border-spacing: 2px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="box">
            <h2>LeaderBoard</h2>
        <?php
            include("functions/dbconnect.php");
            $con= $conn;
            // $result = mysqli_query($con,"SELECT * FROM Scores");
            $result = mysqli_query($con,"SELECT Username,Score FROM Scores");
            echo "<table id = 'ltable' border='1'>";
            $i = 0;
                while($row = $result->fetch_assoc()){
                    if ($i == 0) {
                        $i++;
                        echo "<thead>";
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo "<th>" . $key . "</th>";
                        }
                        echo "</tr>";
                        echo "</thead>";
                        }
                    echo "<tr>";
                foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
        </div>
    </div>
</body>
</html>