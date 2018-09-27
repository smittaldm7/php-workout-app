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
	$user = $c->login();
	
	if ($user==null)
	{
		echo "unsuccessful login";
	}
	else
	{
		echo "successful login - ".$_SESSION["user"]["name"];
	}
	
	
	
	
	
	
?>

<input type="button" value="finished" onclick="location.href='index.php'">
</body>
</html>