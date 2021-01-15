<?php

include "class.php";

class Plane extends Vehicle {
    var $wheels = 10;
}

$jet = new Plane();
echo "<br>Jet created<br>";
echo "Jet moves with " . $jet->wheels . " wheels";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Class Inheritance</title>
</head>
<body>
<?php
    
?>
</body>
</html>