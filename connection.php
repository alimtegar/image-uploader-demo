<?php 

$host = "localhost";
$username = "root";
$password = "";
$db = "image_uploader_demo";

$connection = mysqli_connect($host, $username, $password, $db);

if (!$connection) {
	die("Connection failed : " . mysqli_connect_error());
}

?>