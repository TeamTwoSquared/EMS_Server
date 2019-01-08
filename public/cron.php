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

date_default_timezone_set('Asia/Colombo');
$current_date = date("Y/m/d");;

$sql = "SELECT service_provider_id FROM service_providers";
$result = mysqli_query($connection,$sql);
while($row = mysqli_fetch_row($result))
{
    $sql1 = "SELECT reg_date, star FROM service_providers WHERE service_provider_id = '$row[0]' ";
    $result1 = mysqli_query($connection,$sql1);
    $row1 = mysqli_fetch_row($result1);

    $datetime = explode(" ",$row1[0]);
    $dateOnly = $datetime[0];

    $datetime1 = new DateTime($current_date);
	$datetime2 = new DateTime($dateOnly);
	
    $difference = $datetime1->diff($datetime2);

    $dayDiff = $difference->d + $difference->m*31 + $difference->y*366;

    //Levelling up
    if($row[1]==5 && $dayDiff > 732) 
    {
        $update = "UPDATE service_providers SET level = 3 WHERE service_provider_id = '$row[0]'";
        $updateR = mysqli_query($connection,$update);
    }

    else if($row[1]==5 && $dayDiff > 366)
    {
        $update = "UPDATE service_providers SET level = 2 WHERE service_provider_id = '$row[0]'";
        $updateR = mysqli_query($connection,$update);
    } 

    else if($row[1]==5 && $dayDiff > 186)
    {
        $update = "UPDATE service_providers SET level = 1 WHERE service_provider_id = '$row[0]'";
        $updateR = mysqli_query($connection,$update);
    }

    //Level Down
    

                    
}
        
?>