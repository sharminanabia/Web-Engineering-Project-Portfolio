<?php
$currency = '৳';
$db_username = 'root';
$db_password = '';
$db_name = 'bolt';
$db_host = 'localhost';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

// Debug line to check connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
