<?php

echo $_POST["name"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
</head>
<body>
<form action="post.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>
</body>
</html>