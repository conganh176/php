<?php

$file = "text.txt";

if ($handle = fopen($file, 'r')) {
    $content = fread($handle, filesize($file));
    echo $content;
} else {
    echo "Cannot open the file";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Read File</title>
</head>
<body>
<?php
    
?>
</body>
</html>