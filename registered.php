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
	$success = $c->register();
	
	if($success)
	{
		echo "registration successful";
	}
	else
	{
		echo "unable to register";
	}
	
	
	
	
	
	
	
?>

<input type="button" value="finished" onclick="location.href='index.php'">
</body>
</html>