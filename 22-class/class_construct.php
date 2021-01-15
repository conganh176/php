<?php

class Vehicle {
    var $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;

    function __construct() {
        $this->doors = 2;
        echo $this->doors . "<br>";
    }
}

$modus = new Vehicle();
$bmw = new Vehicle();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Class Construct</title>
</head>
<body>
<?php
    
?>
</body>
</html>