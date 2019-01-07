<?php

	$servername="localhost";
    	$username="admin_ems";
    	$password="ccs709-1";
    	$databasename="admin_ems";

//create connection
$connection = mysqli_connect($servername, $username, $password,$databasename)  or die("Unable to connect");
 
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE settings SET value = 2 WHERE property = 'site_status'";
$result = mysqli_query($connection,$sql);
?>