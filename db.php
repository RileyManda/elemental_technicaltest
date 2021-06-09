<?php
// $con = mysqli_connect("127.0.0.1","root","","devtest");

// if (mysqli_connect_errno())
// {
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

$con = 'mysql:dbname=devtest;host=127.0.0.1';
$username = 'root';
$password = '';
$message = 'Database connection successful';

try
{
	$con = new PDO($con,$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<script>console.log('".$message."');</script>";
}
catch(PDOException $e)
{
	echo "DB Connection Failed".$e->getMessage();
	
	die();
}