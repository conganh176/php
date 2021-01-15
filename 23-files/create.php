<?php

$file = "text.txt";

//create file
if ($handle = fopen($file, 'w')) {
    fwrite($handle, "Hello World");
    fclose($handle);
    echo "File created";
} else {
    echo "The file cannot be created";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Create File</title>
</head>
<body>
<?php
    
?>
</body>
</html>