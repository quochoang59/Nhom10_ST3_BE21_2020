<?php

$currency = 'VNĐ'; // đơn vị tiền tệ

$db_username = 'root'; // user name

$db_password = '';// password

$db_name = 'quochoang'; // tên cơ sở dữ liệu

$db_host = 'localhost';
$port = '3306';



$conn=$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name,$port);
mysqli_query($conn,"SET NAMES 'utf8'");


?>