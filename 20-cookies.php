<?php

$name = "CookiesName";
$value = 420;
$expiration = time() + (60 * 60 * 24 * 7); //seconds * minutes * hours * days

setcookie($name, $value, $expiration);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cookies</title>
</head>
<body>
<?php
    if (isset($_COOKIE["CookiesName"])) {
        $cookieName = $_COOKIE["CookiesName"];
    } else {
        $cookieName = "";
    }

    echo $cookieName;
?>
</body>
</html>