<?php 
if (isset($_POST['submit'])) {
	$min_char = 5;
	$max_char = 20;
	$accounts = ['alpha', 'betaire', 'charlie'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (strlen($username) < $min_char || strlen($username) > $max_char) {
		echo "Username has to be longer than " . $min_char . " characters and shorter than " . $max_char . " characters.<br>";
	}

	if (!in_array($username, $accounts)) {
		echo "Account did not exist.<br>";
	} else {
		echo "Welcome back.<br>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="17-forms.php" method="post">
	<input type="text" name="username" placeholder="Username">
	<br>
	<input type="password" name="password" placeholder="Password">
	<br>
	<input type="submit" name="submit">
</form>
</body>
</html>