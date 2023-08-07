<?php

$server_name = 'database';
$db_username = 'root';
$db_password = 'tiger';
$database_name = 'shop_oop_db';

$conn = mysqli_connect($server_name, $db_username, $db_password, $database_name);

if (!$conn) {
    echo "Something went wrong";
}