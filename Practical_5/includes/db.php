<?php
// MySQL connection
$dbServer = "localhost";
$dbUser = "rutik";
$dbPassword = "Aaaaa111***";
$database = "collegedb";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $database) or die('Mysql Connection Error:' . mysqli_connect_error());
