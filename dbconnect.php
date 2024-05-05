<?php

$conn = mysqli_connect('127.0.0.1', 'root','', 'qlbh') or die('Xin lỗi, database không kết nối được.');

$conn->query("SET NAMES 'utf8mb4'"); 
$conn->query("SET CHARACTER SET utf8mb4");  
$conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");