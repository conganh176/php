<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$x = "outside";

function run() {
	global $x;
	$x = "inside";
}

echo $x . "<br>";
run();
echo $x . "<br>"; 
?>
</body>
</html>