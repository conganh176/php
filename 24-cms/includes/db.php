<?php

$db['host'] = 'localhost';
$db['username'] = 'root';
$db['password'] = '';
$db['db_name'] = '2_cms';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

if (!$connection) {
    echo "Error from connection server";
}

?>