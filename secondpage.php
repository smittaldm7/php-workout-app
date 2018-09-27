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
	$result = $c->getCombination();
	echo "Combination for today:<br>";
	echo "&nbsp;&nbsp;&nbsp;".$result["selected_combination"]["area1text"]. "<br>";
	echo "&nbsp;&nbsp;&nbsp;".$result["selected_combination"]["area2text"]. "<br>";
	echo "&nbsp;&nbsp;&nbsp;".$result["selected_combination"]["area3text"]. "<br>";
	
	
?>

<input type="button" value="finished" onclick="location.href='thirdpage.php?combination_finished_id=<?php echo $result["id"]; ?>'">
</body>
</html>