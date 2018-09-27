<!DOCTYPE HTML>
<html>
<head>
<script>
//alert();
</script>
</head>  
<body>

<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//echo "pp".phpversion();

if( isset($_SESSION["user"]) && $_SESSION["user"] != null )
{
	echo $_SESSION["user"]["name"];
	?>
	<input type="button" value="generate combination" onclick="location.href='secondpage.php'">
	<input type="button" value="logout" onclick="location.href='logout.php'">
	<?php
	
}
else
{
	?>
	<input type="button" value="login" onclick="location.href='login.php'">
	<input type="button" value="register" onclick="location.href='register.php'">	
	
	<?php
}
?>


</body>
</html>