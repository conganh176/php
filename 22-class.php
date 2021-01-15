<?php

class Vehicle {
    public $wheels = 4;
    protected $hood = 1;
    private $engine = 1;
    var $doors = 4;
    static $color = "Blue";

    function __construct() {
        echo "<br>Vehicle created<br>";
    }

    function Move() {
        echo "Vehicle moves";
    }

    function ModifyDoors($number) {
        $this->doors = $number;
    }

    function ChangeColor($color) {
        Vehicle::$color = $color;
    }
}

if (class_exists("Vehicle")) {
    echo "Class existed";
} else {
    echo "Class not found";
}

echo "<br>";

if (method_exists("Vehicle", "Move")) {
    echo "Method existed";
} else {
    echo "Method not found";
}

echo "<br>";

$modus = new Vehicle();
echo $modus->doors . "<br>";
$modus->ModifyDoors(2);
$modus->Move();
echo "<br>" . $modus->doors;

//inheritance
class Plane extends Vehicle {
    var $wheels = 10;
}

$jet = new Plane();
echo "<br>Jet created<br>";
echo "Jet moves with " . $jet->wheels . " wheels";

//access static
echo "<br>" . Vehicle::$color;
$modus->ChangeColor("Red");
echo "<br>" . Vehicle::$color;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Class</title>
</head>
<body>
<?php
    
?>
</body>
</html>