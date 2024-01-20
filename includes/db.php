<?php
$host = "localhost";
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname =  getenv('DB_NAME');

$con = mysqli_connect($host, $user, $password, $dbname);