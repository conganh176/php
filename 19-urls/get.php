<?php

print_r($_GET);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Get</title>
</head>
<body>
<?php 
$id = 69;
$button = "Click me!";
?>
<a href="get.php?id=<?php echo $id;?>&say=nice"><?php echo $button ?></a>
</body>
</html>