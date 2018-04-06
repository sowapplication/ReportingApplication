<?php 

$servername 	= "localhost";
$username 		= "root";
$password 		= "root";
$dbname 		= "sowapplication";

function dbConnection($servername, $username, $password, $dbname)
{
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}
function dbClose($conn)
{
	$conn->close();
}
$mysqli=dbConnection($servername, $username, $password, $dbname);

$serverHostPath = $_SERVER['HTTP_HOST']."/sow/mydoc/";
define("HOSTPATH",$serverHostPath);
?>
