<?php

class Vehicle {
    var $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;

    function Move() {
        echo "Vehicle moves";
    }

    function ModifyDoors($number) {
        $this->doors = $number;
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