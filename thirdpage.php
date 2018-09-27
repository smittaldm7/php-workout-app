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



//echo "third page<br>";

//echo "combo_Id finished".$_GET["combination_finished_id"]."\n";
$c= new controller;
$c->combinationFinished();


?>

<input type="button" value="back to home page" onclick="location.href='index.php'">

</body>
</html>