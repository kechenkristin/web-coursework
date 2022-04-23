<?php
if(isset($_POST["logout"])){
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("Location: ./index.php");
exit;

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
   background-color: blue;
}
input{
   float:right;
}
</style>
</head>
<body>
<div class="footer">
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
    <input type="submit" value = "logout" name = "logout">
 </form>
</div>

</body>
</html> 