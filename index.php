<?php
    include("functions/navbar.php");
?>

<?php 
 session_start();
 // connect to database
 include("functions/dbconnect.php");
 $connect = $conn;


 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: welcome.php");
    exit;
    }
 
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["confirm"]) || empty($_POST["display"])) 
      {  
           
           echo '<script>alert("All Fields are required");history.go(-1);</script>';  
      }  
      else  
      {    
           // access register info
           $username = $_POST["username"]; 
           $fname =  $_POST["fname"];
           $lname =  $_POST["lname"]; 
           $password =  $_POST["password"];
           $confirm =  $_POST["confirm"];
           // test for this part
           $disinfo =  $_POST["display"];
           if($disinfo == "yes"){
               $display = 1;
           }else{
               $display = 0;
           }  
           
           // user exist verify
           $sql = $connect->query("SELECT UserName FROM Users where Username ='{$username}'");
           $row = mysqli_fetch_assoc($sql); 
           
           if ($row > 0) { 
            echo '<script>alert("User already exist!");history.go(-1);</script>';
           } 

           // gurantee the password to be same as confirm
           if($confirm == $password){
                $query = "INSERT INTO Users(UserName, FirstName,LastName,Password,Display) VALUES('$username', '$fname','$lname','$password','$display')";  
                if(mysqli_query($connect, $query))  
                {  
                echo '<script>alert("Registration Done")</script>';  
                }
           }else{
                echo '<script>alert("The confirm pass is not equal to password!");history.go(-1);</script>';  
           }
           
      }  
 }  

 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required");history.go(-1);</script>';  
      }  
      else  
      {  
           $username = $_POST["username"]; 
           $password =  $_POST["password"];
           $query = "SELECT * FROM Users WHERE UserName = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                    if($password == $_POST["password"]){
                        session_start();
                            
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $username;
                        header("Location: welcome.php");
                        //echo '<script>alert("Successfully")</script>'; 
                    }else{
                        echo '<script>alert("Wrong User password");history.go(-1);</script>';
                    }
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details");history.go(-1);</script>';  
           }  
      }  
 } 
 

 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="main">
        <div class = "box">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post" >
                <h2>Login</h2>
                <label for="uname">Username: </label>  
                <input type="text" name = "username"  id = "uname" placeholder = "username"></input><br><br>
                <label for="password">Password: </label>
                <input type="password" name = "password" id = "password" placeholder = "password" ></input><br><br>
                <input type="submit" name = "login"></input><br>
                <p>Don't have an account? <a href = "./register.php">Register now</a></p>
            </form>
        </div>
    
    </div>
</body>
</html>