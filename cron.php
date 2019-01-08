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

$sql = "SELECT service_provider_id FROM service_providers";
$result = mysqli_query($connection,$sql);
while($row = mysqli_fetch_row($result))
{
    $sql1 = "SELECT reg_date FROM service_providers WHERE service_provider_id = '$row[0]' ";
    $result1 = mysqli_query($connection,$sql1);
    $row1 = mysqli_fetch_row($result1);
    echo $row1[0].'<br>';
}
?>