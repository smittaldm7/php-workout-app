<!DOCTYPE HTML>
<html>
<head>
<script>
//alert();
</script>
<?php
include 'controller.php';
?>
</head>  
<body>
	<?php
	$c = new controller;
	$msg = $c->login();

	echo $msg;
	
	if (isset($_SESSION["user"]))
	{
		echo ": ".$_SESSION["user"]["name"];
	}
	
	
	
	
	
	
	
?>

<input type="button" value="finished" onclick="location.href='index.php'">
</body>
</html>