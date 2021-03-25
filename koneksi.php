<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_myweb';

//membuat koneksi

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection

if($conn->connect_error){
	die("connection failed".$conn->connect_error);

}

// echo "connection is successfully";

 ?>