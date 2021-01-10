<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
function init() {
	calculate();
	echo "<br>";
	say();
}

function calculate() {
	echo 420 + 69;
}

function say() {
	echo "Hello" . "<br>";
}

init();

//parameters
function great($name) {
	echo "Welcome, " . $name . "<br>";
}

function calc($number1, $number2) {
	echo $number1 + $number2;
}

great("Cong Anh");
calc(6, 9);
echo "<br>";

//return
function addNumbers($number1, $number2) {
	$sum = $number1 + $number2;
	return $sum;
}

echo addNumbers(4, 2) . "<br>";
echo addNumbers(4, addNumbers(4, 2)) . "<br>";
?>
</body>
</html>