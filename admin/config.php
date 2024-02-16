<?php
$db_host = 'localhost';
$db_user = 'your_db_user';
$db_pass = 'your_db_password';
$db_name = 'your_db_name';

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$db) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
