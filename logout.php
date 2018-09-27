<!DOCTYPE HTML>
<html>
<head>

</head>  
<body>

<?php
//echo "pp".phpversion();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//session_destroy();
unset($_SESSION["user"]);
echo "You have been logged out";

?>
<input type="button" value="back to home page" onclick="location.href='index.php'">

</body>
</html>